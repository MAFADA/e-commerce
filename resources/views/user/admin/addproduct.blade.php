@extends('layouts.admin')

@section('content')
<h2>Not Done</h2>
<form action="/products">
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
              <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" id="product_name" class="form-control">
              </div>
              <div class="form-group">
                <label for="description">Product Description</label>
                <textarea id="description" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="category">Category</label>
                <select id="category" class="form-control custom-select">
                  <option selected disabled>Select One</option>
                  @foreach($categories as $ct)                  
                  <option value="{{ $ct->id }}">
                    {{ $ct->category_name }} 
                  </option>                  
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="stock">Stock</label>
                <input type="text" id="stock" class="form-control">
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                <input type="text" id="price" class="form-control">
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
                <label for="photo">Photo</label>
                <input type="text" id="photo" class="form-control">
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
          <input type="submit" value="Add Product" class="btn btn-success float-right">
        </div>
      </div>     
</form>     
@endsection