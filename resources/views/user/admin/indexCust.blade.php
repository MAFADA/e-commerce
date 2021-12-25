@extends('layouts.admin')
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Customers</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="container">
      <form class="form-inline my-2 my-lg-0 row justify-content-end pb-3" method="get" action="{{ route('users.search') }}">
        <input class="form-control mr-sm-2" type="text" name="search" id="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
    <br>
    <table class="table table-responsive table-striped">
        <thead>
            <tr>
                <th>Name</th>                                    
                <th>Username</th>
                <th>Email</th>
                <th>Address</th>    
                <th>Action</th>                                
            </tr>
        </thead>
        <tbody>
            @foreach($customer as $c)
            @if($c->id==1)
              <!--Admin Tidak Ditampilkan  -->
            @else
                <tr>
                    <td>{{ $c->first_name }} {{  $c->lastname }}</td>    
                    <td>{{ $c->username }}</td>                                  
                    <td>{{ $c->email }}</td>    
                    <td>{{ $c->city }}</td>    
                    <td>
                        <form action="/users/{{ $c->id }}" method="post">
                            <a href="/users/{{ $c->id }}" class="btn btn-primary">View</a>                                        
                            <!-- <a href="/users/{{ $c->id }}/edit" class="btn btn-warning">Edit</a> -->
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                        </form>
                    </td>   
                </tr>  
            @endif                              
            @endforeach

        </tbody>
    </table>
@endsection