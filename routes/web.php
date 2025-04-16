<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/admin/login', function () {
    return view('admin_login');
})->name('admin_login');

Route::get('/admin/profile', function () {
    return view('admin_profile');
})->name('admin_profile');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/products', function () {
    return view('products');
})->name('products');

Route::get('/confirmation', function () {
    return view('confirmation');
})->name('confirmation');

Route::get('/favorites', function () {
    return view('favorites');
})->name('favorites');

Route::get('/productdetail', function () {
    return view('product_detail');
})->name('product_detail');

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