<?php 

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CartController extends Controller
{

    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
        ]);

        $cartItem = Cart::where('user_id', Auth::id())
                        ->where('product_id', $validated['product_id'])
                        ->first();

        if ($cartItem) {
            // If the product is already in the cart, update the quantity
            $cartItem->quantity += $validated['quantity'];
            $cartItem->save();
        } else {
            // Add new product to the cart
            Cart::create([
                'user_id'    => Auth::id(),
                'product_id' => $validated['product_id'],
                'quantity'   => $validated['quantity'],
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }
    
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
    public function store(Request $request)
    {
        // Validate the request with respect to the product's stock
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1|max:' . Product::findOrFail($request->product_id)->stock,
        ]);

        // Logic to add the product to the cart
        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);

        // Redirect to cart with success message
        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
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
