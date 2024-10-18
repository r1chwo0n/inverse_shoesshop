<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // ดึงข้อมูลสินค้าจากฐานข้อมูล
        return view('product', compact('products')); 
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
        return view('chuck70', compact('products'));
    }

    public function showClassicChuck()
    {
        $products = Product::where('category_id', 2)->get();
        return view('classicchuck', compact('products'));
    }

    public function showSport()
    {
        $products = Product::where('category_id', 3)->get();
        return view('sport', compact('products'));
    }

    public function showElevation()
    {
        $products = Product::where('category_id', 4)->get();
        return view('elevation', compact('products'));
    }
}
