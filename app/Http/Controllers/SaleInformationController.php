<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\PaymentHistory;

class SaleInformationController extends Controller
{
    public function sale()
    {
        $orders = Order::select(
            'orders.order_code',
            'orders.status',
        )
            ->leftJoin('users', 'users.id', 'orders.user_id')
            ->where('status', '1')
            ->groupBy('order_code')
            ->get();

        $order_code = [];

        foreach ($orders as $item) {
            $order = $item->order_code;
            array_push($order_code, $order);
        }

        $sale_info = [];

        foreach ($order_code as $item) {
            $total = PaymentHistory::select('user_name','payment_method','total_amount' , 'order_code', 'created_at')->where('order_code', $item)->first()->toArray();
            array_push($sale_info, $total);
        }


        return view('admin.sale information.list', compact('sale_info'));
    }
}
