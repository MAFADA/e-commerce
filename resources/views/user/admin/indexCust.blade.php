@extends('layouts.admin')
@section('content')
    <table class="table table-responsive table-striped">
        <thead>
            <tr>
                <th>Name</th>                                    
                <th>Username</th>
                <th>Email</th>
                <th>City</th>    
                <th>Action</th>                                
            </tr>
        </thead>
        <tbody>
            @foreach($customer as $c)
                <tr>
                    <td>{{ $c->first_name }} {{  $c->lastname }}</td>    
                    <td>{{ $c->username }}</td>                                  
                    <td>{{ $c->email }}</td>    
                    <td>{{ $c->city }}</td>    
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