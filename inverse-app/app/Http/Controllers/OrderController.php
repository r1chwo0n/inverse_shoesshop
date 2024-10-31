<?php

namespace App\Http\Controllers;
use Auth;
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

        // Retrieve the authenticated user
        $user = auth()->user();

        // Pass the user and order to the view
        return view('summary', compact('user', 'order'));
    }

    public function checkout()
    {
        $user = Auth::user();
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();
        $order = null; 

        return view('summary', compact('user', 'cartItems', 'order'));
        // return view('summary', compact('user', 'cartItems'));
    }

    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)
            ->with('orderItems.product')
            ->orderBy('created_at', 'asc') // เรียงตามวันที่สร้าง
            ->get();

        return view('order', compact('orders'));
    }

    public function confirmOrder(Request $request)
    {
        $user = auth()->user();
        $cartItems = Cart::where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.summary')->withErrors(['msg' => 'Your cart is empty.']);
        }

        $order = null;

        DB::transaction(function () use ($cartItems, &$order) {
            $subtotal = $cartItems->sum(function ($item) {
                return $item->product->price * $item->quantity;
            });

            // คำนวณส่วนลด
            $discount = $subtotal > 2000 ? $subtotal * 0.10 : 0;
            $order = Order::create([
                'user_id' => auth()->id(),
                'total_price' => $subtotal,
                'discount' => $discount,
                'totalDiscount' => $subtotal - $discount,
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

            // ลบข้อมูลใน Cart หลังจากยืนยันคำสั่งซื้อ
            Cart::where('user_id', auth()->id())->delete();;
        });

        return redirect()->route('orders.index')->with('success', 'คำสั่งซื้อสำเร็จและเคลียร์ตะกร้าสินค้าเรียบร้อยแล้ว');
    }
}
