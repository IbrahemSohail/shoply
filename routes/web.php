<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProcessCheckoutController;



// Route::view('/','home')->name('home'); // Removed in favor of CategoryController@home

// Route::view('/cart','cart')->name('cart');



Route::get('/dashboard', [DashboardController::class,'view']
)->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';


// Route::resource('categories', CategoryController::class);

// Route::resource('products', ProductController::class);




Route::get('/product', [ProductController::class, 'index'])->name('products.index');

Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');





Route::get('/category', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');





Route::get('/live-search', [ProductController::class, 'liveSearch'])->name('live.search');
Route::get('/search', [CategoryController::class, 'Search'])->name('search');

Route::get('/', [CategoryController::class, 'home'])->name('home');


Route::get('/category/{category}', [ProductController::class, 'showByCategory'])->name('category.products');

Route::get('/Contact-us',[ContactUsController::class,'view'])->name('contact-us');
Route::get('/about-us',[AboutUsController::class,'view'])->name('about-us');

Route::resource('taxes', TaxController::class);


Route::post('/products/{product}/add-to-cart', [CartController::class, 'store'])
    ->name('cart.add');

Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');

Route::delete('/cart/{cartItems}', [CartController::class, 'destroy'])
    ->name('cart.remove');


Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');

Route::post('/order', [OrderController::class, 'checkout'])->name('checkout.process');

    
    
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'view'])->name('dashboard');
    
    // Products Admin Routes
    Route::get('/products', [ProductController::class,'view'])->name('products');
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Categories Admin Routes
    Route::get('/categories', [CategoryController::class,'view'])->name('categories');
    Route::get('category/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

Route::get('/orders', [OrderController::class, 'index'])->name('order');

