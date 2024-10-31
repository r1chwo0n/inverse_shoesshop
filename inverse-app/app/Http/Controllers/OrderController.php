<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function checkout()
    {
        $user = Auth::user();
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();
        return view('summary', compact('user', 'cartItems'));
    }

    public function confirmOrder(Request $request)
    {
        DB::transaction(function () {
            $user = Auth::user();
            $cartItems = Cart::with('product')->where('user_id', $user->id)->get();

            // คำนวณยอดรวม
            $subtotal = $cartItems->sum(function ($item) {
                return $item->product->price * $item->quantity;
            });

            // คำนวณส่วนลด
            $discount = $subtotal > 2000 ? $subtotal * 0.10 : 0;

            // สร้าง Order ใหม่
            $order = Order::create([
                'user_id' => $user->id,
                'subtotal' => $subtotal,
                'discount' => $discount,
                'total' => $subtotal - $discount,
            ]);

            // ย้ายรายการจาก Cart ไป OrderDetails และอัปเดตจำนวนสินค้า
            foreach ($cartItems as $item) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product->id,
                    'unit_price' => $item->product->price,
                    'quantity' => $item->quantity,
                ]);

                // ลดจำนวน stock ของสินค้า
                $item->product->decrement('stock', $item->quantity);
            }

            // ลบข้อมูลใน Cart หลังจากยืนยันคำสั่งซื้อ
            Cart::where('user_id', $user->id)->delete();
        });

        return redirect()->route('orders.index')->with('success', 'คำสั่งซื้อสำเร็จและเคลียร์ตะกร้าสินค้าเรียบร้อยแล้ว');
    }


    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)
            ->with('orderDetails.product')
            ->orderBy('created_at', 'asc') // เรียงตามวันที่สร้าง
            ->get();

        return view('orders.index', compact('orders'));
    }

}

