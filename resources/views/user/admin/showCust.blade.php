@extends('layouts.admin')
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile Customer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item"><a href="/users">Customers</a></li>
              <li class="breadcrumb-item active">Profile Customer</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
<div class="container-fluid">
    <a href="/products" class="btn btn-primary">Back</a>
    <br><br>
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('storage/'.$user->photo)}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $user->first_name}}  {{ $user->lastname }}</h3>

                <p class="text-muted text-center">{{ $user->role }}</p>

                <!-- <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul>                 -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->            
          </div>

          <div class="col-md-3">

            <!-- About Me Box -->
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Email</strong>

                <p class="text-muted">
                 {{$user->email}}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                <p class="text-muted">
                    {{$user->city}} {{ $user->province }} {{ $user->country }}
                    {{ $user->address }}
                </p>

                <hr>
<!-- 
                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p> -->

                <!-- <hr> -->

                <strong><i class="far fa-file-alt mr-1"></i> Phone Number</strong>

                <p class="text-muted">{{ $user->phone_number }}</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection