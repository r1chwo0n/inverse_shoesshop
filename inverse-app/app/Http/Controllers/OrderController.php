<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Ensure DB facade is imported

class OrderController extends Controller
{
    public function summary($orderId)
    {
        // Retrieve the order with its items
        $order = Order::with('orderItems.product')->findOrFail($orderId);

        // Pass the order to the view
        return view('summary', compact('order'));
    }

    public function checkout(Request $request)
    {
        $user = auth()->user();
        $cartItems = Cart::where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.summary')->withErrors(['msg' => 'Your cart is empty.']);
        }

        $order = null;

        DB::transaction(function () use ($cartItems, &$order) {
            $order = Order::create([
                'user_id' => auth()->id(),
                'total_price' => $cartItems->sum(function ($item) {
                    return $item->product->price * $item->quantity;
                }),
            ]);

            foreach ($cartItems as $item) {
                $productSize = ProductSize::where('product_id', $item->product_id)
                    ->where('size', $item->productSize->size)
                    ->first();

                if (!$productSize || $productSize->stock < $item->quantity) {
                    throw new \Exception('Not enough stock for ' . $item->product->name);
                }

                $productSize->decrement('stock', $item->quantity);

                // Add size to OrderItem creation
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'size' => $item->productSize->size, // Include size
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);
            }

            Cart::where('user_id', auth()->id())->delete();
        });

        return redirect()->route('order.summary', $order->id);
    }

}
