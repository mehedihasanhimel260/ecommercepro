<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartsData =  Cart::where('user_id', auth()->id())->with('user', 'product')->get();
        return view('home.cart.index',compact('cartsData'));
    }

    public function store(Request $request)
    {
        // Add a new item to the cart
        $data = $request->validate([
            'user_id' => 'required|integer',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        Cart::create($data);
        return redirect('/carts');
    }
    public function destroy($id)
    {
        // Remove a specific item from the cart
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();
        return redirect('/carts');
    }
    public function update(Request $request, $id)
    {
        // Update a specific item in the cart
        $data = $request->validate([
            'quantity' => 'required|integer',
        ]);

        $cartItem = Cart::findOrFail($id);
        $cartItem->update($data);
        return redirect()->back();
    }
}
