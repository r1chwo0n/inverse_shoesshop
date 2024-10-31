<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display the cart items for the authenticated user.
     */
    public function index()
    {
        // Get the cart items for the authenticated user
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        // Return the view with cart items
        return view('cart', compact('cartItems'));
    }

    /**
     * Add a product to the cart or update its quantity if it already exists.
     */
    public function addToCart(Request $request)
    {
        // Validate the request
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'size' => 'required|exists:product_sizes,size', // Ensure size exists
            'quantity' => 'required|integer|min:1'
        ]);

        // Retrieve the product and the selected size (product_size_id)
        $product = Product::findOrFail($request->product_id);
        $productSize = ProductSize::where('product_id', $product->id)
            ->where('size', $request->size)
            ->firstOrFail();

        $quantity = $request->quantity;

        // Check if the item with the same product and product_size_id already exists in the cart
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->where('product_size_id', $productSize->id) // Compare by product_size_id
            ->first();

        if ($cartItem) {
            // Update the quantity if the item is already in the cart
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Add a new item to the cart
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'product_size_id' => $productSize->id, // Store product_size_id
                'size' => $productSize->size,
                'quantity' => $quantity
            ]);
        }

        // Redirect back with success message
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }


    public function update(Request $request, $cartId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::findOrFail($cartId);
        $productSize = ProductSize::where('product_id', $cartItem->product_id)
            ->where('size', $cartItem->size)
            ->firstOrFail();

        // Ensure quantity does not exceed available stock
        $quantity = min($request->quantity, $productSize->stock);

        $cartItem->quantity = $quantity;
        $cartItem->save();

        return response()->json(['success' => true, 'newQuantity' => $cartItem->quantity]);
    }

    /**
     * Remove an item from the cart.
     */
    public function destroy($cartId)
    {
        // Find the cart item and delete it
        $cartItem = Cart::findOrFail($cartId);
        $cartItem->delete();

        // Respond with a success message
        return response()->json(['success' => true]);
    }
}
