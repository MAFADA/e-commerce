<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Cust\CustomerController;
use App\Http\Controllers\Cust\PesanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::resource('customers', CustomerController::class);

Route::resource('products', ProductController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pesan/{id}', [PesanController::class,'index']);

Route::post('/pesan/{id}', [PesanController::class,'pesan']);