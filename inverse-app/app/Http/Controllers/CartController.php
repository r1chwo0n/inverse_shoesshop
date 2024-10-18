<?php 

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CartController extends Controller
{
    /** แสดง Cart page */
    public function index(): View
    {
        $user_id = Auth::id();
        $cartItems = Cart::with('product')
            ->where('user_id', $user_id)
            ->get();

        return view('cart', compact('cartItems'));
    }

    /** เพิ่มสินค้าลงในรถเข็น */
    public function store(Request $request, $productId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $user_id = Auth::id();
        $cartItem = Cart::where('user_id', $user_id)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            // ถ้ามีสินค้าในรถเข็นอยู่แล้ว ก็ให้เพิ่มจำนวน
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // ถ้ายังไม่มี ก็สร้างสินค้าใหม่ในรถเข็น
            Cart::create([
                'user_id' => $user_id,
                'product_id' => $productId,
                'quantity' => $request->quantity,
            ]);
        }

        return Redirect::route('cart')->with('success', 'Product added to cart');
    }

    /** อัพเดทจำนวนสินค้าในรถเข็น */
    public function update(Request $request, $cartId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = Cart::findOrFail($cartId);
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return response()->json(['success' => true]); // ส่ง response กลับไปที่ JavaScript
    }

    /** ลบสินค้าในรถเข็น */
    public function destroy($cartId)
    {
        $cartItem = Cart::findOrFail($cartId);
        $cartItem->delete();

        return response()->json(['success' => true]); // Return JSON response
    }
}
