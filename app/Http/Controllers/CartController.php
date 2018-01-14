<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Pizza;
use App\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    //Kosár létrehozása
    public function create(Request $request, $id)
    {
        $pizza = Pizza::where("id", $id)->first();

        $all_price = $pizza->price*$request->only('quantity')["quantity"];

        $item_array = array(
            "id" => $pizza->id,
            "name" => $pizza->name,
            "quantity" => $request->only('quantity')["quantity"],
            "price" => $all_price
        );
        $arrays = array();
        if (session()->get('i'))
        {
            $array = session()->get('i');
            //session()->forget('i');
            foreach ($array as $item)
            {
                $arrays[] =  $item;
            }
            $arrays[] = $item_array;
            session()->put('i',$arrays);
        }
    else
        {
            session()->push('i',$item_array);
        }

        $request->session()->reflash();
        $request->session()->flash('success', 'Hozzáadva a kosárhoz!');
        return redirect()->back()->with("items", $item_array);
    }

    //Rendelés leadásának véglegeítése
    public function store(Request $request)
    {

        $user_data = UserData::create($request->only("firstname", "lastname", "phone", "city", "street", "h_number"));

        $total_price = null;
        foreach (session()->get('i') as $cart_item)
        {
            $total_price = $total_price + $cart_item["price"];
        }
        $order = Order::create([
            "userdata_id" => $user_data->id,
            "price"       => $total_price
        ]);
        foreach (session()->get('i') as $cart_item)
        {
            Cart::create([
                "pizza_id" => $cart_item["id"],
                "order_id" => $order->id,
                "quantity" => $cart_item["quantity"],
                "price"    => $cart_item["price"]
            ]);
        }
        session()->forget('i');
        $request->session()->reflash();
        $request->session()->flash('success', 'A rendelésed sikeresen továbbítottuk!');
        return redirect()->route('welcome');

    }

    //kosár tartalma
    public function show(Cart $cart)
    {
        $item_array = array();
        if (session()->get('i'))
        {
            array_push($item_array, session()->get('i'));
        }

        if (isset($item_array[0]))
            $items = $item_array[0];
        else
            $items = null;

        return view('cart.index')
            ->with("items", $items);
    }

}
