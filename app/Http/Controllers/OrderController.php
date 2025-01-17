<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\PaymentHistory;

class OrderController extends Controller
{

    //order list page
    public function listPage()
    {
        $orders = Order::select(
            'users.name as user_name',
            'orders.count',
            'orders.status',
            'orders.order_code',
            'orders.id as order_id',
            'orders.created_at'
        )
            ->leftJoin('users', 'users.id', 'orders.user_id')
            ->when(request('searchKey'), function ($query) {
                $query = $query->whereAny(['orders.order_code', 'users.name'], 'LIKE', '%' . request('searchKey') . '%');
            })
            ->groupBy('order_code')
            ->orderBy('orders.created_at', 'desc')
            ->get();

        return view('admin.order.list', compact('orders'));
    }


    //order code details page
    public function detailPage($order_code)
    {
        $orderProduct =  Order::select(
            'orders.created_at',
            'orders.count as order_qty',
            'orders.order_code',
            'orders.status',
            'users.name as order_name',
            'users.nickname as order_nickname',
            'products.id as product_id',
            'products.name as product_name',
            'products.price as product_price',
            'products.image as product_image',
            'products.stock as product_stock'
        )
            ->leftJoin('users', 'users.id', 'orders.user_id')
            ->leftJoin('products', 'products.id', 'orders.product_id')
            ->where('orders.order_code', $order_code)
            ->get();

        $paymentHistory = PaymentHistory::where('order_code', $order_code)->first();

        $status = [];
        foreach ($orderProduct as $item) {
            $statusValue = $item->product_stock < $item->order_qty ? false : true;
            array_push($status, $statusValue);
        }


        $check = '';

        in_array(false, $status) ? $check = false : $check = true;

        return view('admin.order.detail', compact('orderProduct', 'paymentHistory', 'order_code', 'check'));
    }


    //change status with ajax
    public function changeStatus(Request $request)
    {
        $order_code = $request->order_code;
        $status = $request->status;

        Order::where('order_code', $order_code)->update([
            'status' => $status,
        ]);

        return response([
            'status' => 'ok',
            'message' => 'updated'
        ]);
    }


    //order confirm with ajax
    public function confirm(Request $request)
    {

        //status change to 1
        Order::where('order_code', $request[0]['order_code'])->update([
            'status' => 1,
        ]);

        //reduce product in product stock
        foreach ($request->all() as $item) {
            Product::where('id', $item['product_id'])->decrement('stock', $item['product_count']);
        }

        //retun to ajax , detail page
        return response()->json([
            'status' => 'ok',
        ], 200);
    }

    //order reject api
    public function reject(Request $request)
    {
        Order::where('order_code', $request['order_code'])->update([
            'status' =>  2,
        ]);

        return response()->json([
            'status' => 'ok',
        ]);
    }
}
