<?php

namespace App\Http\Controllers\Cust;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {        
        $Orders = Order::where('user_id', Auth::user()->id)->where('status', '!=',0)->get();

        return view('user/customer/payment', compact('Orders'));         
    }

    public function detail($id)
    {        
        $orders = Order::find($id);
        $order_details = OrderDetail::where('order_id', $id)->get();
        
        return view('user/customer/detail_payment', compact('orders', 'order_details'));         
    }
}
