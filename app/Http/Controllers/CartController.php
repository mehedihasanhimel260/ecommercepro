<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        // Retrieve all items in the cart
        return view('home.cart.index');
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
}
