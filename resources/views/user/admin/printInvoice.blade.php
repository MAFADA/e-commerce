<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice</title>
</head>
<body>
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> GXShop
                    <small class="float-right">Date&Time: {{$order->orderdate}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                  <strong>{{$source->username}}</strong><br>
                    {{$source->address}}<br>
                    {{$source->city}} City, {{$source->province}}, {{$source->country}}<br>
                    Phone: {{$source->phone_number}}<br>
                    Email: {{$source->email}}
                  </address>
                </div>
                <br>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>{{$order->user->username}}</strong><br>
                    {{$order->user->address}}<br>
                    {{$order->user->city}} City, {{$order->user->province}}, {{$order->user->country}}<br>
                    Phone: {{$order->user->phone_number}}<br>
                    Email: {{$order->user->email}}
                  </address>
                </div>
                <!-- /.col -->
                <br>
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Order ID:</b> {{$order->id}}<br>
                  <!-- <b>Payment Due:</b> 2/22/2014<br> -->
                  <b>Account:</b> {{$order->user_id}}
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <br>
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>                      
                      <th>Qty</th>
                      <th>Product</th>                      
                      <th>Description</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($detail as $d)
                    <tr>                      
                      <td>{{$d->total_product}}</td>
                      <td>{{$d->product->product_name}}</td>
                      <td>{{$d->product->description}}</td>
                      <td>Rp. {{number_format($d->total_price_product)}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->                
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due 2/22/2014</p>

                  <div class="table-responsive">
                    <table class="table">  
                      <tr>
                        <th>Kode: </th>
                        <td>Rp. {{number_format($order->code)}}</td>
                      </tr>                      
                      <tr>
                        <th>Total:</th>
                        <td>Rp. {{number_format($order->total_price)}}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <script>
  // window.addEventListener("load", window.print());
</script>
</body>
</html>
      
                    <!-- this row will not appear when printing -->
                    <!-- <div class="row no-print">
                      <div class="col-12">
                        <a href="orders/{{$order->id}}/report" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> -->
                        <!-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                          Payment
                        </button> -->
                        <!-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                          <i class="fas fa-download"></i> Generate PDF
                        </button> -->
                      <!-- </div>
                    </div> -->