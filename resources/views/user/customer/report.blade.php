<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Resi</title>
    </head>
    <body>
        <style type="text/css">
            table tr td,
            table tr th {
                font-size: 9pt;
            }
        </style>
        <h2 align="center">Resi Pembelian</h2>
        <p>Tanggal Pemesanan : {{$orders->orderdate}}</p>
        <b>Name</b> : {{ $users->first_name }} {{ $users->lastname }} <br />
        <b>Alamat</b> : {{ $users->address }} <br />
        <b>Telfon</b> : {{ $users->phone_number }} <br /><br />
        <table class="table table-responsive table-striped">
            <thead>
                <tr align="center">
                    <th>No</th>
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
                    <td>{{$detail->product->product_name}}</td>
                    <td>{{$detail->total_product}}</td>
                    <td>Rp. {{number_format($detail->product->price)}}</td>
                    <td>Rp. {{number_format($detail->total_price_product)}}</td>
                </tr>
                @endforeach
                <tr align="right">
                    <td colspan="4"><strong>Total Harga : </strong></td>
                    <td><strong>Rp. {{number_format($orders->total_price)}}</strong></td>
                </tr>
                <tr align="right">
                    <td colspan="4"><strong>Kode Unik :</strong></td>
                    <td><strong>Rp. {{number_format($orders->code)}}</strong></td>
                </tr>
                <tr align="right">
                    <td colspan="4"><strong>Total Yang Harus Dibayar :</strong></td>
                    <td><strong>Rp. {{number_format($orders->total_price + $orders->code)}}</strong></td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
