@extends('layouts.customer')
@section('content')
<div class="container">
    <nav aria-label="breadcrumb" class="mt-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
    </ol>
    </nav>
    <div class="container">
        <form class="form-inline my-2 my-lg-0 row justify-content-end pb-3">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    <!-- <div class="row justify-content-center">
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
    </div> -->
</div>
<div class="container">
   <section class="products mb-5">
      <div class="row ">
         @foreach($products as $product)
         <div class="col-md-3 mb-4">
            <div class="card">
               <div class="card-body text-center">
                  <img src="{{asset('storage/'.$product->photo)}}" class="img-fluid">
                  <div class="row mt-2">
                     <div class="col-md-12">
                        <h5><strong>{{ $product->product_name }}</strong> </h5>
                        <h5>Rp. {{ number_format($product->price) }}</h5>
                     </div>
                  </div>
                  <div class="row mt-2">
                     <div class="col-md-12">
                        <a href="pesan/{{$product->id}}" class="btn btn-dark btn-block"><i class="fas fa-eye"></i> Detail</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </section>
</div>


@endsection