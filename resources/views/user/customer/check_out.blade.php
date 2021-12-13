@extends('layouts.customer')
@section('content')
<div class="container">
    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/customer">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Check Out</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <a href="/customer" class="btn btn-outline-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        
    </div>

    <div class="col-md-12 mt-3">
        <div class="card">
            <div class="card-body">
                <h3><i class="fa fa-shopping-cart"></i> Check Out</h3>
                <table class="table">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <?php $no = 1;?>
                    @foreach($order_detail as $detail)
                    <tbody>
                        <tr align="center">
                            <td>{{$no++}}</td>
                            <td><img src="{{asset('storage/'.$detail->product->photo)}}" width="100px" ></td>
                            <td>{{$detail->product->product_name}}</td>
                            <td>{{$detail->total_product}}</td>
                            <td>Rp. {{number_format($detail->product->price)}}</td>
                            <td>Rp. {{number_format($detail->total_price_product)}}</td>
                            <td>
                                <form action="check-out/{{$detail->id}}" method="post">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="5"><strong>Total Harga</strong></td>
                            <td align="center"><strong>Rp. {{number_format($order->total_price)}}</strong></td>
                            <td align="center">
                                <form action="" method="post">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-dark">Bayar</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection