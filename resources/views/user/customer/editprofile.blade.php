@extends('layouts.customer')
@section('content')
<div class="container">
    @if(empty($user->address) || empty($user->phone_number) || empty($user->city) || empty($user->country) || empty($user->province))
    <div class="alert alert-danger" role="alert">
        Harap Melengkapi Data Diri Agar Dapat Melakukan Check Out <a href="profile" class="alert-link">Edit Profile</a>
    </div>
    @endif
    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/customer">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">User</li>
        </ol>
    </nav>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item mr-1"><a class="nav-link btn-outline-dark active" href="#activity" data-toggle="tab">Profile</a></li>
                    <li class="nav-item"><a class="nav-link btn-outline-dark" href="#settings" data-toggle="tab">Edit Profile</a></li>
                    <li class="nav-item"><a class="nav-link btn-outline-dark" href="#addPhoto" data-toggle="tab">Photo</a></li>
                    <!-- <li class="nav-item"><a class="nav-link btn-outline-dark" href="#updatePhoto" data-toggle="tab">Edit Photo</a></li> -->
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <div class="post">
                            <div class="card-header">
                                <h3 class="card-title">Profile</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-portrait mr-1"></i>Foto Profile</strong><br>
                                <img src="{{asset('storage/'.$user->photo)}}" width="150px" class="rounded">
                                <hr>

                                <strong><i class="fas fa-user mr-1"></i>Nama</strong>
                                <p class="text-muted">{{ Auth::user()->first_name }} {{$user->lastname}}</p>
                                <hr>

                                <strong><i class="fas fa-user-check mr-1"></i>Username</strong>
                                <p class="text-muted">{{$user->username}}</p>
                                <hr>

                                <strong><i class="fas fa-envelope mr-1"></i>Email</strong>
                                <p class="text-muted">{{$user->email}}</p>
                                <hr>
                                
                                <strong><i class="fas fa-phone mr-1"></i>No Telepon</strong>
                                <p class="text-muted">{{$user->phone_number}}</p>
                                <hr>
                                
                                <strong><i class="fas fa-map-marker-alt mr-1"></i>Alamat</strong>
                                <p class="text-muted">{{$user->address}}, {{$user->country}}, {{$user->city}}, {{$user->province}}</p>
                                <hr>

                            </div>
                        </div>
                    </div>
    
                    <div class="tab-pane" id="settings">
                        <form action="/profile" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            @method('POST')
                            <input type="hidden" name="id" value="{{$user->first_name}}"></br>

                            <div class="form-group row">
                                <label for="first_name" class="col-sm-3 col-form-label">Nama Depan</label>
                                <div class="col-sm-9">
                                    <input placeholder="Nama Depan" id="first_name" type="text" class="form-control" required="required" name="first_name" value="{{$user->first_name}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastname" class="col-sm-3 col-form-label">Nama Belakang</label>
                                <div class="col-sm-9">
                                    <input placeholder="Nama Belakang" id="lastname" type="text" class="form-control" required="required" name="lastname" value="{{$user->lastname}}">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">E-Mail</label>
                                <div class="col-sm-9">
                                    <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" required autocomplete="email" name="email" value="{{$user->email}}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone_number" class="col-sm-3 col-form-label">No. Telefon</label>
                                <div class="col-sm-9">
                                    <input placeholder="No. Telefon" id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" autocomplete="phone_number" name="phone_number" value="{{$user->phone_number}}">
                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <input placeholder="Alamat" id="address" type="text" class="form-control @error('address') is-invalid @enderror" autocomplete="address" name="address" value="{{$user->address}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country" class="col-sm-3 col-form-label">Negara</label>
                                <div class="col-sm-9">
                                    <input placeholder="Negara" id="country" type="text" class="form-control @error('country') is-invalid @enderror" autocomplete="country" name="country" value="{{$user->country}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="province" class="col-sm-3 col-form-label">Propinsi</label>
                                <div class="col-sm-9">
                                    <input placeholder="Propinsi" id="province" type="text" class="form-control @error('province') is-invalid @enderror" autocomplete="province" name="province" value="{{$user->province}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-sm-3 col-form-label">Kota</label>
                                <div class="col-sm-9">
                                    <input placeholder="Kota" id="city" type="text" class="form-control @error('city') is-invalid @enderror" autocomplete="city" name="city" value="{{$user->city}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="offset-sm-3 col-sm-9">
                                    <button type="submit" class="btn btn-outline-dark">
                                        Save
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>

                    <div class="tab-pane" id="addPhoto">
                    <form action="/profile/storePhoto" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$user->first_name}}"></br>

                            <div class="form-group row">
                                <label for="photo" class="col-sm-3 col-form-label">Photo</label>
                                <div class="col-sm-9">
                                    <input placeholder="Photo" id="photo" type="file" class="form-control" required="required" name="photo">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="offset-sm-3 col-sm-9">                                
                                    <button type="submit" name="add" class="btn btn-outline-dark">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- <div class="tab-pane" id="updatePhoto">
                        <form action="/profile/updatePhoto" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @method('PUT')
                            <input type="hidden" name="id" value="{{$user->first_name}}"></br>

                            <div class="form-group row">
                                <label for="photo" class="col-sm-3 col-form-label">Photo</label>
                                <div class="col-sm-9">
                                    <input placeholder="Photo" id="photo" type="file" class="form-control" required="required" name="photo" value="{{$user->photo}}">
                                    <img width="150px" src="{{asset('storage/'.$user->photo)}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="offset-sm-3 col-sm-9">                                
                                    <button type="submit" name="edit" class="btn btn-outline-dark">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
