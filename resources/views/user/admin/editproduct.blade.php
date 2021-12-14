@extends('layouts.admin')

@section('content')
<!-- <h2>Not Done</h2> -->
<div class="row">
  <div class="col-md-6">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Product</h3>
        
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
      <form action="/products/{{ $product->id }}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      @method('PUT')
              <input type="hidden" name="id" value="{{$product->id}}"></br>
              <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control" required="required" name="product_name" value="{{ $product->product_name }}">
              </div>
              <div class="form-group">
                <label for="description">Product Description</label>
                <input type="text" class="form-control" required="required" name="description" value="{{ $product->description }}">
                <!-- <textarea name="description" class="form-control" rows="4" value="{{ $product->description }}"></textarea> -->
              </div>
              <div class="form-group">
                <label for="Category">Category</label>
                <select name="Category" class="form-control">                  
                  @foreach($categories as $ct)                  
                  <option value="{{$ct->id}}">
                    {{ $product->category_id == $ct->id ? "selected":""}}>
                    {{ $ct->category_name }}
                  </option>                  
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="stock">Stock</label>
                <input type="text" name="stock" class="form-control" value="{{ $product->stock }}">
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" class="form-control" value="{{ $product->price }}">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Photo</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="photo">Photo Product</label>
                <input type="file" name="photo" class="form-control" required="required" 
                value="{{ $product->photo }}"><br>
                <img width="150px" src="{{asset('storage/'.$product->photo)}}">
              </div>              
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="/products" class="btn btn-secondary">Cancel</a>
          <!-- <input type="submit" name="edit" value="Save Changes" class="btn btn-success float-right"> -->
          <button type="submit" name="edit" class="btn btn-primary float-right">Save Changes</button>
        </div>
      </div>
</form>      
@endsection