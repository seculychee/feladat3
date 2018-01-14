<?php

namespace App\Http\Controllers;

use App\Pizza;
use Illuminate\Http\Request;
use Validator;

class PizzaController extends Controller
{
    //kezdőlap
    public function welcome()
    {
        $pizzas = Pizza::all();
        $item_array = array();
        if (session()->get('i'))
        {
            array_push($item_array, session()->get('i'));
        }
        if (isset($item_array[0]))
        $items = $item_array[0];
        else
            $items = null;


        return view('welcome')
            ->with('pizzas',$pizzas)
            ->with("items", $items);
    }
    //pizzak listázása
    public function index()
    {
        $pizzas = Pizza::all();
        return view('pizza.index')->with('pizzas', $pizzas);
    }
    //pizza létrehozása
    public function create(Request $request)
    {
        $validata = $this->valid($request->all());
        if ($validata->fails()) {
            return redirect()->route('admin_pizza.newpizza')
                ->withErrors($validata->errors()->all())
                ->withInput();
        }

        Pizza::create($request->all());

        $request->session()->reflash();
        $request->session()->flash('success', 'Sikeres felvitel!');
        return redirect()->back();
    }

    //pizza szerkesztés
    public function edit(Request $request, $id)
    {
        Pizza::where('id', $id)->update($request->only("name", "price", "desc"));
        $request->session()->reflash();
        $request->session()->flash('success', 'Sikeres szerkesztés!');
        return redirect()->back();
    }

    //validácio
    protected function valid(array $data)
    {
        $rule = [
            'name' => 'required',
            'price' => 'required',
        ];
        $message = [
            'name.required' => 'A pizza nevének megadása kötelező!',
            'price.required' => 'Az ár megadása kötelező!',
        ];
        return Validator::make($data, $rule, $message);
    }
}
