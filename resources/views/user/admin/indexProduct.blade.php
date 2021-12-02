@extends('layouts.admin')
@section('content')
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
                                    <td>{{ $p->price }}</td>                                  
                                    <td>{{ $p->stock }}</td>    
                                    <td>
                                    <form action="/" method="post">
                                        <a href="/" class="btn btn-primary">View</a>                                        
                                        <a href="/" class="btn btn-warning">Edit</a>
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