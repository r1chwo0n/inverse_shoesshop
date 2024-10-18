<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CartController extends Controller
{
    /** แสดง Cart page */
    public function index(): View
    {
        $user_id = Auth::id();
        $cartItem =Cart::with('product')
            ->where('user_id', $user_id)
            ->get();

        return view('cart.index', compact('CartItems'));
    }

    /** อัพเดทจำนวนสินค้าในรถเข็น */
    public function update(Request $request, $cartId)
    {
        $request->validate([
            'quantity'=>'required|integermin:1'
        ]);
        $cartItem = Cart::findOrFail($cartId);
        $cartItem->quantity = $request->quantity;
        $cartItem->save;

        return Redirect::route('cart.index')->with('success', 'quantity updated');
    }

    /** ลบสินค้าในรถเข็น */
    public function destroy($cartId)
    {
        $cartItem=Cart::findOrFail($cartId);
        $cartItem->delete();

        return Redirect::route('cart.index')->with('success', 'deleted');
    }
}
