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
              <form action="/products" method="post" enctype="multipart/form-data">
                @csrf
              <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" name="product_name" class="form-control" required="required">
              </div>
              <div class="form-group">
                <label for="description">Product Description</label>
                <input type="text" class="form-control" required="required" name="description"></br>
                <!-- <textarea name="description" class="form-control" rows="4"></textarea> -->
              </div>
              <div class="form-group">
                <label for="Category">Category</label>
                <select name="Category" class="form-control custom-select">
                  <!-- <option selected disabled>Select One</option> -->
                  @foreach($categories as $ct)                  
                  <option value="{{ $ct->id }}">
                    {{ $ct->category_name }} 
                  </option>                  
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="stock">Stock</label>
                <input type="text" name="stock" class="form-control" required="required">
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" class="form-control" required="required">
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
                <input type="file" name="photo" required="required" class="form-control">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="/products" class="btn btn-secondary">Cancel</a>
          <button type="submit" name="add" class="btn btn-primary float-right">Add Product</button>
        </div>
      </div>     
    </form>     
@endsection