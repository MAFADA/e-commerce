@extends('layouts.admin')
@section('content')
<table class="table table-responsive table-striped">
    <thead>
        <tr>          
            <!-- <th>Customer Name</th>   -->            
            <th>Username</th>                                    
            <th>Date & Time</th>
            <th>Status</th>
            <th>Total Price</th>    
            <th>Action</th>        
        </tr>
    </thead>
    <tbody>
        @foreach($order as $o)
        <tr>                          
            <td>{{ $o->user->username }}</td>    
            <td>{{ $o->orderdate }}</td>                                  
            <td>{{ $o->status }}</td>
            <td>Rp. {{ number_format($o->total_price) }}</td>                
            <td>
            <form action="orders/{{$o->id}}" method="post">
                <a href="orders/{{$o->id}}" class="btn btn-primary">View</a>
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