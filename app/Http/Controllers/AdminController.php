<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::count();    
        $users = User::count();
        $orders = Order::count();

        return view('user.admin.dashboard',['products'=>$products,'orders'=>$orders,'users'=>$users]);
    }
}
