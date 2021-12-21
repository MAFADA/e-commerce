<?php

namespace App\Http\Controllers\Cust;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Category;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {        
        $product = Product::find($id);
        return view('user/customer/order',['product'=>$product]);         
    }

    public function order(Request $request, $id)
    {
        $product = Product::find($id);
        $tanggal = Carbon::now('+07:00');

        // validasi stok mencukupi
        if($request->jumlah_pesanan > $product->stock){
            return redirect('order/'.$id);
        }

        // cek validasi
        $cek_order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();

        // menyimpan pada database order
        if(empty($cek_order)){
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->orderdate = $tanggal;
            $order->status = 0;
            $order->code = mt_rand(1,999);
            $order->total_price = 0;
            $order->save();
        }

        // menyimoan pada database order_detail
        $new_order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();

        // cek order sama
        $cek_order_detail = OrderDetail::where('product_id', $product->id)->where('order_id', $new_order->id)->first();
        
        if(empty($cek_order_detail)){
            $order_detail = new OrderDetail;
            $order_detail->product_id = $product->id;
            $order_detail->order_id = $new_order->id;
            $order_detail->total_product = $request->jumlah_pesanan;
            $order_detail->total_price_product = $product->price * $request->jumlah_pesanan;
            $order_detail->save();
        } else {
            $order_detail = OrderDetail::where('product_id', $product->id)->where('order_id', $new_order->id)->first();
            $order_detail->total_product = $order_detail->total_product+$request->jumlah_pesanan;
            
            $new_order_detail = $product->price * $request->jumlah_pesanan;
            $order_detail->total_price_product = $order_detail->total_price_product + $new_order_detail;
            $order_detail->update();            
        }
    
    	//jumlah total
    	$order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
    	$order->total_price = $order->total_price+$product->price*$request->jumlah_pesanan;
    	$order->update();
        
        return redirect('customer');
    }

    public function check_out()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
        if(!empty($order)){
            $order_detail = OrderDetail::where('order_id', $order->id)->get();
            return view('user.customer.check_out', compact('order', 'order_detail'));
        }
        return view('user.customer.check_out');
    }

    public function delete($id)
    {        
        $order_detail = OrderDetail::where('id', $id)->first();
        
        $order = Order::where('id', $order_detail->order_id)->first();
        $order->total_price = $order->total_price - $order_detail->total_price_product;
        $order->update();

        $order_detail->delete();
        return redirect('check-out');
    }

    public function confirm(){
        $user = User::where('id', Auth::user()->id)->first();
        if(empty($user->address) || empty($user->phone_number) || empty($user->city) || empty($user->country) || empty($user->province)){
            return redirect('profile');
        }

        $order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
        $order_id = $order->id;
        $order->status = 1;
        $order->orderdate = Carbon::now('+07:00');
        $order->update();
        
        $order_detail = OrderDetail::where('order_id', $order_id)->get();
        foreach($order_detail as $order_details){
            $product = Product::where('id', $order_details->product_id)->first();
            $product->stock -= $order_details->total_product;
            $product->update();
        }
        return redirect('payment');
    }
}
