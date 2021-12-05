@extends('layouts.customer')
@section('content')
<div class="container">
    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/customer">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$product->product_name}}</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <a href="/customer" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{asset('storage/'.$product->photo)}}" class="rounded mx-auto d-block" width="100%" alt="...">
                        </div>
                        <div class="col-md-6">
                            <h3>{{ $product->product_name }}</h3>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Harga</td>
                                        <td> : </td>
                                        <td>Rp {{number_format($product->price)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Stok</td>
                                        <td> : </td>
                                        <td>{{$product->stock}}</td>
                                    </tr>
                                    <tr class="align-top">
                                        <td>Keterangan</td>
                                        <td> : </td>
                                        <td>{{$product->description}}</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Pesanan</td>
                                        <td> : </td>
                                        <td>
                                            <form action="/pesan/{{$product->id}}" method="post">
                                                @csrf
                                                <input type="text" name="jumlah_pesanan" class="form-control" required="">
                                                <button type="submid" class="btn btn-primary mt-3">
                                                    <i class="fa fa-shopping-cart"></i> Masukkan Keranjang
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection