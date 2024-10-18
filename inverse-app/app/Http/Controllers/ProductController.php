<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // ดึงข้อมูลสินค้าจากฐานข้อมูล
        return view('product.product', compact('products')); 
    }

    // public function chuck70() {
    //     // Logic for the Chuck 70 page (if needed)
    //     return view('chuck70');  // This loads the chuck70.blade.php file
    // }

    // public function classicChuck() {
    //     // Logic for the Classic Chuck page (if needed)
    //     return view('classicchuck');  // This loads the classicchuck.blade.php file
    // }

    // public function sport() {
    //     // Logic for the Sport page (if needed)
    //     return view('sport');  // This loads the sport.blade.php file
    // }

    // public function elevation() {
    //     // Logic for the Elevation page (if needed)
    //     return view('elevation');  // This loads the elevation.blade.php file
    // }

    // In your ProductController

    public function showChuck70()
    {
        $products = Product::where('category_id', 1)->get();
        return view('product.chuck70', compact('products'));
    }

    public function showClassicChuck()
    {
        $products = Product::where('category_id', 2)->get();
        return view('product.classicchuck', compact('products'));
    }

    public function showSport()
    {
        $products = Product::where('category_id', 3)->get();
        return view('product.sport', compact('products'));
    }

    public function showElevation()
    {
        $products = Product::where('category_id', 4)->get();
        return view('product.elevation', compact('products'));
    }

    public function showProductDetail($id)
    {
        $product = Product::findOrFail($id); // Fetch the product by ID
        return view('product.productDetail', compact('product')); // Pass product data to the detail view
    }


    public function addToCart(Request $request, $productId)
    {
        $request  ->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($productId);

        // Check if requested quantity is available in stock
        if ($request->input('quantity') > $product->stock) {
            return redirect()->back()->with('error', 'Requested quantity exceeds available stock.');
        }

        // Proceed to add to cart logic
        // Example: Cart::add($product, $request->input('quantity'));

        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully.');
    }

}
