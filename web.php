<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FavoriteController;

// Route::get('/', function () {
//     return view('homepage');
// })->name('homepage');

// Route::get('/', [ProductController::class, 'homepage'])->name('homepage');
Route::get('/', [ProductController::class, 'homepage'])->name('homepage');



Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/admin/login', function () {
    return view('admin_login');
})->name('admin_login');

Route::get('/admin/profile', function () {
    return view('admin_profile');
})->name('admin_profile');

Route::get('/products', function () {
    return view('products');
})->name('products');

Route::get('/confirmation', function () {
    return view('confirmation');
})->name('confirmation');

Route::get('/favorites', function () {
    return view('favorites');
})->name('favorites');

Route::get('/shopping_cart1', function () {
    return view('shopping_cart1');
})->name('shopping_cart1');

Route::get('/shopping_cart2', function () {
    return view('shopping_cart2');
})->name('shopping_cart2');

Route::get('/shopping_cart3', function () {
    return view('shopping_cart3');
})->name('shopping_cart3');

Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{category}', [ProductController::class, 'byCategory'])->name('products.byCategory');
Route::get('/products/{category}/{subcategory}', [ProductController::class, 'bySubcategory'])->name('products.bySubcategory');

Route::middleware(['auth'])->group(function () {
    Route::post('/favorites/add/{product}', [FavoriteController::class, 'add'])->name('favorites.add');
    Route::delete('/favorites/remove/{product}', [FavoriteController::class, 'remove'])->name('favorites.remove');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
});


Route::get('/product/{id}', [ProductController::class, 'show'])->name('product_detail');

