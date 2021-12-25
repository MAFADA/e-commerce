@extends('layouts.admin')
@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="container">
      <form class="form-inline my-2 my-lg-0 row justify-content-end pb-3" method="get" action="{{ route('products.search') }}">
        <input class="form-control mr-sm-2" type="text" name="search" id="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
    <a href="/products/create" class="btn btn-primary">Add Product</a>
    <br><br>
    <table class="table table-responsive table-striped">
    <thead>
        <tr>
            <th>Product Name</th>                                    
            <th>Price</th>
            <th>Stock</th>
            <th>Category</th>                                    
        </tr>
    </thead>
    <tbody>
        @foreach($product as $p)
        <tr>
            <td>{{ $p->product_name }}</td>    
            <td>Rp. {{ number_format($p->price) }}</td>                                  
            <td>{{ $p->stock }}</td>    
            <td>
            <form action="/products/{{ $p->id }}" method="post">
                <a href="/products/{{ $p->id }}" class="btn btn-primary">View</a>                                        
                <a href="/products/{{ $p->id }}/edit" class="btn btn-warning">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
            </form>
            </td>
        </tr>                                
        @endforeach
    </tbody>
</table>
@endsection