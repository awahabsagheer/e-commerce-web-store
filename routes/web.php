<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Models\Product;

// ==========================================
// 1. PUBLIC ROUTES (No login required)
// ==========================================

Route::get('/', function () {
    $products = Product::take(3)->get();
    return view('welcome', compact('products'));
})->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', function() {
    return redirect()->route('contact')->with('success', 'Thank you for contacting us! We will get back to you soon.');
})->name('contact.store');

// Cart Routes
Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
Route::get('cart', [ProductController::class, 'cart'])->name('cart');
Route::get('remove-from-cart/{id}', [ProductController::class, 'remove'])->name('remove.from.cart');
Route::get('update-cart/{id}', [ProductController::class, 'remove'])->name('update.cart'); // Added to fix missing route error

Route::get('/clear-cart', function() {
    session()->forget('cart');
    return "Cart has been cleared! <a href='/products'>Go back to Shop</a>";
});

// Checkout for both guests and logged-in users
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout.show');
Route::post('/place-order', [OrderController::class, 'store'])->name('place.order');


// ==========================================
// 2. CUSTOMER ROUTES (Requires login)
// ==========================================

Route::middleware(['auth', 'verified'])->group(function () {
    
    // Customer Order History (Using myOrders method)
    Route::get('/my-orders', [OrderController::class, 'myOrders'])->name('orders.my-orders');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// ==========================================
// 3. ADMIN ROUTES (Locked to Admins only)
// ==========================================

Route::middleware(['auth', 'admin'])->group(function () {
    
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/admin/orders', [AdminController::class, 'index'])->name('admin.orders');
    Route::patch('/admin/orders/{id}', [AdminController::class, 'update'])->name('admin.orders.update');

    // User & Admin Management Routes
    Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.users');
    Route::patch('/admin/users/{id}/promote', [AdminController::class, 'promoteUser'])->name('admin.users.promote');
    Route::post('/admin/users/store', [AdminController::class, 'storeAdmin'])->name('admin.users.store');

    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
});

require __DIR__.'/auth.php';