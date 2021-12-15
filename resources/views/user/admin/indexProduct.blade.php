@extends('layouts.admin')
@section('content')
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