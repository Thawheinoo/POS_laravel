<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\PaymentHistory;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    //sale amount
    public function adminHome()
    {

        $orders = Order::select(
            'orders.order_code',
            'orders.status',
        )
            ->where('status', '1')
            ->groupBy('order_code')
            ->get();

        $order_code = [];

        foreach ($orders as $item) {
            $order = $item->order_code;
            array_push($order_code, $order);
        }

        $sale = [];

        foreach ($order_code as $item) {
            $total = PaymentHistory::select('total_amount')->where('order_code', $item)->sum('total_amount');
            array_push($sale, $total);
        }

        $sale = array_sum($sale);


        //admin list
        $adminList = User::where('role', 'admin')->count('id');

        $adminList = $adminList + 1;

        //user list
        $userList = User::where('role', 'user')->count('id');

        //pending request
        $pending_order = count(Order::where('status', '0')->groupBy('order_code')->get());

        //Reject Order
        $reject_order = count(Order::where('status', '2')->groupBy('order_code')->get());

        //Successful Order
        $success_order = count(Order::where('status', '1')->groupBy('order_code')->get());

        //total product
        $total_product = Product::count('id');

        //total category
        $total_category = Category::count('id');


        return view('admin.home.list', compact('sale', 'adminList', 'userList', 'pending_order', 'reject_order', 'success_order' , 'total_product' ,'total_category'));
    }
}
