<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use Auth;
use App\Models\User;
use PDF;
class OrdersController extends Controller
{
    public function report($id){
        $admin = User::find(1);
        $order = Order::find($id);
        $detail = OrderDetail::all()->where('order_id',$order->id);

        $pdf = PDF::loadview('user.admin.printInvoice',['order'=>$order,'detail'=>$detail,'source'=>$admin]);
        return $pdf->stream();
    }

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::all();
        $detail = OrderDetail::all();
        return view('user.admin.indexOrders',['order'=>$order,'detail'=>$detail]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = User::find(1);
        // $orderFromAdmin = 
        $order = Order::find($id);
        // $detail= OrderDetail::find($id);
        // $detail = OrderDetail::where('order_id',$order->id);
        $detail = OrderDetail::all()->where('order_id',$order->id);
        return view('user.admin.invoice',['order'=>$order,'detail'=>$detail,'source'=>$admin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $detail = OrderDetail::where('order_id',$order->id);
        $detail->delete();
        $order->delete();
        return redirect()->route('orders.index');
    }
}
