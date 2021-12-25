@extends('layouts.admin')
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
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