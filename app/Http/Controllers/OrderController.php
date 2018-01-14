<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view("orders.index")->with("orders",$orders);
    }
    public function edit($id)
    {
        $order = Order::where('id', $id)->first();
        $cart = Cart::where('order_id', $order->id)->get();

        return view('orders.edit')
            ->with('orders',$order)
            ->with('cart',$cart);
    }



}
