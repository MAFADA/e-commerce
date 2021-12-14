@extends('layouts.admin')
@section('content')
<table class="table table-responsive table-striped">
    <thead>
        <tr>
            <th>Product Photo</th>
            <th>Product Name</th>                                    
            <th>Price</th>
            <th>Stock</th>
            <th>Total Price</th>                                    
        </tr>
    </thead>
    <tbody>
        @foreach($order as $o)
        <tr>
            <td>{{ $o->order_details->product->photo }}</td>    
            <td>{{ $o->order_details->product->product_name }}</td>    
            <td>{{ $o->order_details->product->price }}</td>                                  
            <td>{{ $o->order_details->product->stock }}</td>    
            <td>{{ $o->total_price }}</td>
            <td>
            <form action="" method="post">
                <a href="" class="btn btn-primary">View</a>                                        
                <a href="" class="btn btn-warning">Edit</a>
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