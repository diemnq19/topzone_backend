<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\OrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class,'login'])->name('login');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/login/index', [App\Http\Controllers\Auth\LoginController::class, 'index']);
Route::middleware(['auth'])->group(function () {
    Route::get('/user',  [App\Http\Controllers\UserController::class, 'user'])->name('user');
});
Route::resource('brands', BrandController::class);
Route::resource('news', NewsController::class);
Route::resource('reviews', ReviewController::class);
Route::resource('products', ProductController::class);
Route::resource('shopping-carts', ShoppingCartController::class);
Route::resource('orders', OrderController::class);
