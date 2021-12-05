<?php

namespace App\Http\Controllers\Cust;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {        
        $product = Product::find($id);
        return view('user/customer/pesan',['product'=>$product]);         
    }

    public function pesan(Request $request, $id)
    {
        $product = Product::find($id);
        $tanggal = Carbon::now();

        // validasi stok mencukupi
        if($request->jumlah_pesanan > $product->stock){
            return redirect('pesan/'.$id);
        }

        // cek validasi
        $cek_order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();

        // menyimpan pada database order
        if(empty($cek_order)){
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->orderdate = $tanggal;
            $order->status = 0;
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
}
