@extends('layouts.customer')
@section('content')

<div class="container">
    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/customer">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pembayaran</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <a href="/customer" class="btn btn-outline-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
    </div>

    <div class="col-md-12 mt-3">
        <div class="card">
            <div class="card-body">
                <h3><i class="fa fa-money-bill-wave"></i> Pembayaran</h3>
                <table class="table">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Jumlah Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; ?>
                    @foreach($Orders as $order)
                    <tr align="center">
                        <td>{{ $no++ }}</td>
                        <td>{{ $order->orderdate}}</td>
                        <td>
                            @if($order->status == 1)
                            Belum dibayar
                            @else
                            Sudah dibayar
                            @endif
                        </td>
                        <td>Rp. {{ number_format($order->total_price+$order->code)}}</td>
                        <td>
                            <a href="/payment/{{$order->id}}" class="btn btn-dark btn-block"><i class="fas fa-info-circle"></i> Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection