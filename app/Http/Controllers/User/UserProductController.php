<?php

namespace App\Http\Controllers\user;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Comment;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\PaymentHistory;
use App\Http\Controllers\Controller;
use App\Models\ActionLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserProductController extends Controller
{
    //product details page
    public function detailsPage($id)
    {
        $product = Product::select('categories.name as category_name', 'products.*')
            ->leftJoin('categories', 'products.category_id', 'categories.id')
            ->where('products.id', $id)
            ->first();

        $relatedProduct = Product::select('categories.name as category_name', 'products.*')
            ->leftJoin('categories', 'products.category_id', 'categories.id')
            ->where('categories.id', $product->category_id)
            ->where('products.id', '!=', $product->id)
            ->get();

        $comment_data = Comment::select('users.name', 'users.nickname', 'users.profile', 'comments.message', 'comments.product_id', 'comments.user_id', 'comments.created_at', 'comments.id as comment_id')
            ->leftJoin('users', 'users.id', 'comments.user_id')
            ->where('comments.product_id', $id)
            ->orderBy('comments.created_at', 'desc')
            ->get();

        $rating = Rating::where('product_id', $id)->avg('count');

        $user_rating = Rating::where('product_id', $id)->where('user_id', Auth::user()->id)->first('count');

        $user_rating = $user_rating == null ? 0 : $user_rating['count'];

        // dd($user_rating);

        //action logs
        $this->actionLogs(Auth::user()->id, $id, 'seen');

        $view_count = count(ActionLog::where('post_id', $id)->where('action', 'seen')->get());


        return view('user.home.shop_detail', compact('product', 'relatedProduct', 'comment_data', 'rating', 'user_rating', 'view_count',));
    }


    //add to cart (create)
    public function addToCart(Request $request)
    {
        Cart::Create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'qty' => $request->qty,
        ]);

        return to_route('userHome');
    }


    // cart page route
    public function cart()
    {
        $cart_data = Cart::select('products.id as product_id', 'products.image as product_image', 'products.name as product_name', 'products.price as product_price', 'carts.user_id', 'carts.id as cart_id', 'carts.qty')
            ->leftJoin('products', 'carts.product_id', 'products.id')
            ->where('carts.user_id', Auth::user()->id)
            ->get();

        $total = 0;
        foreach ($cart_data as $item) {
            $total += $item->product_price * $item->qty;
        }

        return view('user.home.cart', compact('cart_data', 'total'));
    }

    //cart product delete
    public function delete($id)
    {
        Session::forget('cart_count');

        Cart::find($id)->delete();

        $cart_count = Cart::where('user_id', Auth::user()->id)->count('id');

        Session::put('cart_count', $cart_count);

        return back();
    }

    //cart api
    public function temp(Request $request)
    {

        $orderArray = [];

        foreach ($request->all() as $item) {
            array_push($orderArray, [
                'user_id' => $item['user_id'],
                'product_id' => $item['product_id'],
                'count' => $item['qty'],
                'status' => 0,
                'order_code' => $item['order_code'],
                'total_amount' => $item['total_amount']
            ]);
        }

        session()->put('temp', $orderArray);

        return response()->json([
            'status' => 'ok',
        ], 200);
    }


    //payment page
    public function paymentpage()
    {
        $payment = Payment::get();
        $orderList = Session::get('temp');
        return view('user.home.payment', compact('payment', 'orderList'));
    }

    //product payment slip
    public function slip(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'phone' => 'required',
            'address' => 'required|max:255',
            'payslip_image' => 'required',
            'payment_method' => 'required',
        ]);

        $data = [
            'user_name' => $request->user_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'payment_method' => $request->payment_method,
            'order_code' => $request->order_code,
            'total_amount' => $request->total_amount,
        ];

        //save image to payslip_img
        if ($request->hasFile('payslip_image')) {
            $imgName = uniqid() . $request->file('payslip_image')->getClientOriginalName();
            $request->file('payslip_image')->move(public_path() . '/payslip_img/', $imgName);

            $data['payslip_image'] = $imgName;
        }
        // create data to payment History table
        PaymentHistory::create($data);

        //order and clear cart
        session()->forget('cart_count');

        //add orders table
        $orderList = Session::get('temp');

        foreach ($orderList as $item) {
            Order::create([
                'user_id' => $item['user_id'],
                'product_id' => $item['product_id'],
                'count' => $item['count'],
                'status' => $item['status'],
                'order_code' => $item['order_code'],
            ]);

            //clear cart
            Cart::where('user_id', $item['user_id'])
                ->where('product_id', $item['product_id'])
                ->delete();
        }

        return to_route('product#orderPage');
    }

    //order page route
    public function orderPage()
    {
        $order_data = Order::where('user_id', Auth::user()->id)
            ->groupBy('order_code')
            ->get();
        return view('user.home.orderPage', compact('order_data'));
    }

    //viewOrderList
    public function viewOrderList($order_code)
    {

        $orderList = Order::select('products.image', 'products.name', 'products.price', 'orders.count', 'orders.created_at')
            ->leftJoin('products', 'products.id', 'orders.product_id')
            ->where('orders.order_code', $order_code)
            ->get();

        $total_amount = PaymentHistory::select('total_amount')->where('order_code', $order_code)->first();

        return view('user.home.orderList', compact('orderList', 'total_amount'));
    }

    //user product comment
    public function comment(Request $request)
    {
        Comment::create([
            'product_id' => $request->product_id,
            'user_id' => Auth::user()->id,
            'message' => $request->comment,
        ]);

        $this->actionLogs(Auth::user()->id, $request->product_id, 'comment');

        return back();
    }

    //comment delete
    public function commentdelete($id)
    {
        Comment::where('id', $id)->delete();
        return back();
    }

    //product rating
    public function rating(Request $request)
    {

        Rating::updateOrCreate([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
        ], [
            'count' => $request->productRating,
        ]);

        return back();
    }

    //action logs
    private function actionLogs($user_id, $product_id, $action)
    {
        ActionLog::create([
            'user_id' => $user_id,
            'post_id' => $product_id,
            'action' => $action,
        ]);
    }
}
