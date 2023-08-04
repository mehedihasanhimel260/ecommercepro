<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function createOrder( )
    {
         // Assuming the user is authenticated and you have the user ID
    $userId = auth()->user()->id;

    // Get the user's cart items
    $cartItems = Cart::where('user_id', $userId)->get();

    // Calculate the total amount
    $totalAmount = 0;
    foreach ($cartItems as $cartItem) {
        $totalAmount += $cartItem->product->price * $cartItem->quantity;
    }

    // Create a new order record
    $order = Order::create([
        'user_id' => $userId,
        'total_amount' => $totalAmount,
    ]);

    // Create order items
    foreach ($cartItems as $cartItem) {
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $cartItem->product_id,
            'quantity' => $cartItem->quantity,
            'price' => $cartItem->product->price,
        ]);
    }

    // Clear the user's cart (optional, depending on your design)
    Cart::where('user_id', $userId)->delete();
    return redirect()->back();

    // Redirect to the order details page or show a success message
    // return redirect()->route('order.details', ['orderId' => $order->id]);
    // or return a response with a success message
    // return response()->json(['message' => 'Order placed successfully']);

    }
}
