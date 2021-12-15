<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Cust\CustomerController;
use App\Http\Controllers\Cust\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\Cust\EditProfileController;
use App\Http\Controllers\Cust\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('users', UserController::class);

Route::resource('admin', AdminController::class);

Route::resource('customer', CustomerController::class);

Route::resource('products', ProductController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/order/{id}', [OrderController::class,'index']);

Route::post('/order/{id}', [OrderController::class,'order']);

Route::resource('profile', ProfileController::class);

Route::get('/check-out', [OrderController::class,'check_out']);

Route::delete('/check-out/{id}', [OrderController::class,'delete']);

Route::get('/check-out/confirm', [OrderController::class,'confirm']);

Route::resource('orders', OrdersController::class);