<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('start'); // Landing page
});

Route::get('/products', [CartController::class, 'index'])->name('products');
Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::post('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('remove-from-cart');
Route::post('/clear-cart', [CartController::class, 'clearCart'])->name('clear-cart');
Route::post('/increase-qty/{id}', [CartController::class, 'increaseQty'])->name('increase-qty');
Route::post('/decrease-qty/{id}', [CartController::class, 'decreaseQty'])->name('decrease-qty');
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
