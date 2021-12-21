@extends('layouts.customer')
@section('content')
<div class="container">
    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/customer">Home</a></li>
        <li class="breadcrumb-item"><a href="/payment">Pembayaran</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Pembayaran</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <a href="/payment" class="btn btn-outline-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
    </div>

    <div class="col-md-12 mt-3">
        <div class="card">
            <div class="card-body">
                <h4><strong>Sukses Melakukan Check Out</strong></h4>
                <h6>
                    Pesanan anda sudah sukses dicheck out, selanjutnya untuk pembayaran silahkan teransfer ke rekening 
                    <strong>Bank BRI : 0006-01-016800-53-7 a/n Moh. Iqbal Waldan</strong> dengan nominal : 
                    <strong>{{number_format($orders->total_price + $orders->code)}}</strong>
                </h6>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h3><i class="fa fa-money-bill-wave"></i> Detail Pembayaran</h3>
                <p>Tanggal Pemesanan : {{$orders->orderdate}}</p>
                <table class="table">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no = 1;
                    ?>
                        @foreach($order_details as $detail)
                        <tr align="center">
                            <td>{{$no++}}</td>
                            <td><img src="{{asset('storage/'.$detail->product->photo)}}" width="100px" ></td>
                            <td>{{$detail->product->product_name}}</td>
                            <td>{{$detail->total_product}}</td>
                            <td>Rp. {{number_format($detail->product->price)}}</td>
                            <td>Rp. {{number_format($detail->total_price_product)}}</td>
                        </tr>
                        @endforeach
                        <tr align="right">
                            <td colspan="5"><strong>Total Harga : </strong></td>
                            <td><strong>Rp. {{number_format($orders->total_price)}}</strong></td>
                        </tr>
                        <tr align="right">
                            <td colspan="5"><strong>Kode Unik :</strong></td>
                            <td><strong>Rp. {{number_format($orders->code)}}</strong></td>
                        </tr>
                        <tr align="right">
                            <td colspan="5"><strong>Total Yang Harus Dibayar :</strong></td>
                            <td><strong>Rp. {{number_format($orders->total_price + $orders->code)}}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                            <td align="center">
                                <a href="" class="btn btn-dark btn-block" onclick="return confirm('anda yakin ingin membayar?');">Cetak Resi</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection