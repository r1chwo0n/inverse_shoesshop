<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', function () {
    return view('product');
})->middleware(['auth', 'verified'])->name('product');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Define routes for each shoe type page
Route::get('/product/chuck70', [ProductController::class, 'showChuck70'])->name('chuck70');
Route::get('/product/classic-chuck', [ProductController::class, 'showClassicChuck'])->name('classicchuck');
Route::get('/product/sport', [ProductController::class, 'showSport'])->name('sport');
Route::get('/product/elevation', [ProductController::class, 'showElevation'])->name('elevation');

Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/{id}', [ProductController::class, 'showProductDetail'])->name('productDetail');




require __DIR__.'/auth.php';
