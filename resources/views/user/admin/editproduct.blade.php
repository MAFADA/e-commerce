@extends('layouts.admin')

@section('content')
<h2>Not Done</h2>
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
                <input type="text" id="product_name" class="form-control" value="AdminLTE">
              </div>
              <div class="form-group">
                <label for="description">Product Description</label>
                <textarea id="description" class="form-control" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>
              </div>
              <div class="form-group">
                <label for="category">Category</label>
                <select id="category" class="form-control custom-select">
                  <option disabled>Select one</option>
                  <option>On Hold</option>
                  <option>Canceled</option>
                  <option selected>Success</option>
                </select>
              </div>
              <div class="form-group">
                <label for="stock">Stock</label>
                <input type="text" id="stock" class="form-control" value="Deveint Inc">
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                <input type="text" id="price" class="form-control" value="Tony Chicken">
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
                <label for="inputEstimatedBudget">Estimated budget</label>
                <input type="number" id="inputEstimatedBudget" class="form-control" value="2300" step="1">
              </div>              
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="/products" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Save Changes" class="btn btn-success float-right">
        </div>
      </div>
@endsection