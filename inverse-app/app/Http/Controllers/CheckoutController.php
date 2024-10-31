<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductSize;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $cartItems = Cart::where('user_id', auth()->id())->get();
        $totalPrice = 0;

        // Create the order
        $order = new Order();
        $order->user_id = auth()->id();
        $order->total_price = 0; // Will calculate later
        $order->save();

        foreach ($cartItems as $item) {
            // Check stock
            $productSize = ProductSize::where('product_id', $item->product_id)
                                    ->where('size', $item->productSize->size)
                                    ->first();

            if ($productSize->stock < $item->quantity) {
                return back()->withErrors(['msg' => 'Not enough stock for ' . $item->product->name]);
            }

            // Decrease stock
            $productSize->stock -= $item->quantity;
            $productSize->save();

            // Create an order item
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item->product_id;
            $orderItem->quantity = $item->quantity;
            $orderItem->price = $item->product->price; // Store the price
            $orderItem->save();

            $totalPrice += $item->product->price * $item->quantity;
        }

        // Update total price of the order
        $order->total_price = $totalPrice;
        $order->save();

        // Optionally clear the cart
        Cart::where('user_id', auth()->id())->delete();

        return redirect()->route('cart.summary', $order->id);
    }
}
