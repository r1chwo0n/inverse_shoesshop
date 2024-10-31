<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');



Route::get('/product', function () {
    return view('product');
})->middleware(['auth', 'verified'])->name('product');

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/addresses/create', [AddressController::class, 'create'])->name('addresses.create');
    Route::post('/addresses', [AddressController::class, 'store'])->name('addresses.store');
    Route::get('/addresses/{address}/edit', [AddressController::class, 'edit'])->name('addresses.edit');
    Route::put('/addresses/{id}', [AddressController::class, 'update'])->name('addresses.update');
    Route::put('/addresses/{address}', [AddressController::class, 'update'])->name('addresses.update');
    Route::delete('/addresses/{address}', [AddressController::class, 'destroy'])->name('addresses.destroy');




    Route::get('/cart/{id}', [CartController::class, 'show'])->name('cart.show');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    
    // Add product to cart
    Route::post('/cart', [CartController::class, 'addToCart'])->name('cart.add');

    
    // Update cart item
    Route::put('/cart/{cartId}', [CartController::class, 'update'])->name('cart.update');
    
    // Delete cart item
    Route::delete('/cart/{cartId}', [CartController::class, 'destroy'])->name('cart.destroy');
    

    // Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    // Route::get('/summary', [SummaryController::class, 'summary'])->name('summary');
    // Route::get('/order/summary/{order}', [OrderController::class, 'summary'])->name('order.summary');
});

// Define routes for each shoe type page
Route::get('/product/chuck70', [ProductController::class, 'showChuck70'])->name('chuck70');
Route::get('/product/classic-chuck', [ProductController::class, 'showClassicChuck'])->name('classicchuck');
Route::get('/product/sport', [ProductController::class, 'showSport'])->name('sport');
Route::get('/product/elevation', [ProductController::class, 'showElevation'])->name('elevation');

// Route::get('/product', [ProductController::class, 'index'])->name('products.index');
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/{id}', [ProductController::class, 'showProductDetail'])->name('productDetail');
// Route::get('/product/{id}', [ProductController::class, 'showProductDetail'])->name('productDetail');


// Route for the cart summary page
// Route::get('/cart/summary', [SummaryController::class, 'summary'])->name('cart.summary');

// Route for checking out (moving items to orders)
// Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');

// Route for order summary page after checkout
// Route::get('/order/summary/{orderId}', [OrderController::class, 'summary'])->name('order.summary');

Route::get('/summary', [OrderController::class, 'checkout'])->name('summary');

Route::post('/confirm-order', [OrderController::class, 'confirmOrder'])->name('confirm-order');

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
require __DIR__.'/auth.php';
