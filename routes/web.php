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
use App\Http\Controllers\Cust\PaymentController;

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

Route::get('/searchCustomer',[UserController::class, 'searchCustomer'])->name('users.search');

Route::resource('admin', AdminController::class);

Route::resource('customer', CustomerController::class);

Route::resource('products', ProductController::class);

Route::get('/searchProduct',[ProductController::class,'searchProduct'])->name('products.search');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/order/{id}', [OrderController::class,'index']);

Route::post('/order/{id}', [OrderController::class,'order']);

Route::resource('/profile', ProfileController::class);

Route::post('/profile/storePhoto', [ProfileController::class,'storePhoto'])->name('profile.storePhoto');

Route::post('/profile/updatePhoto', [ProfileController::class,'updatePhoto'])->name('profile.updatePhoto');

Route::get('/check-out', [OrderController::class,'check_out']);

Route::delete('/check-out/{id}', [OrderController::class,'delete']);

Route::get('/check-out/confirm', [OrderController::class,'confirm']);

Route::resource('/orders', OrdersController::class);

// Route::get('/searchOrders',[OrdersController::class, 'searchOrders'])->name('orders.search');

Route::get('/orders/{id}/report',[OrdersController::class,'report'])->name('orders.report');

Route::get('/payment', [PaymentController::Class,'index']);
Route::get('/payment/{id}', [PaymentController::Class,'detail']);

Route::get('/search', [OrderController::class, 'search'])->name('search');

Route::get('/payment/{id}/report', [PaymentController::class,'report']);