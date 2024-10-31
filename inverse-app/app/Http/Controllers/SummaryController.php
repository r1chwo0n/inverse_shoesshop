<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class SummaryController extends Controller
{
    public function summary()
    {
        $user = auth()->user();
        $cartItems = Cart::where('user_id', $user->id)->get(); // Assuming you're storing cart items
        
        return view('summary', compact('cartItems', 'user'));
    }

}
