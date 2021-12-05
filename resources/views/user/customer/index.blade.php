@extends('layouts.customer')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5">
            <img src="" class="rounded mx-auto d-block" width="100" alt="">
        </div>
        @foreach($products as $product)
        <div class="col-md-4 mb-3">
            <div class="card">
                <img src="{{asset('storage/'.$product->photo)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$product->product_name}}</h5>
                    <p class="card-text">
                        <strong>Harga : </strong>Rp {{ number_format($product->price) }} <br>
                        <strong>Stok : </strong>{{ $product->stock }} <br>
                        <hr>
                        <strong>Keterangan : </strong> <br> {{ $product->description }}
                    </p>
                    <a href="pesan/{{$product->id}}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Pesan</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection