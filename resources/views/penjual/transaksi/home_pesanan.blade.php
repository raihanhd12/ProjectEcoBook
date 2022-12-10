@extends('layouts.navbar_penjual')

@section('navbar-penjual')

<h1 class="h3 mb-2 text-gray-800">Pesanan Pembeli</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pesanan Pembeli</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                @if ($dPesanan->isEmpty())
                    <h2>Anda Belum Mempunyai Produk Buku</h2>
                @else
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pembeli</th>
                            <th>Nama Buku</th>
                            <th>Total Harga</th>
                            <th>Status Pesanan</th>
                            <th>Status Pengiriman</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dPesanan as $item)
                        <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->first_name_keranjang}}</td>
                                <td>{{$item->transaksi->nama_buku_keranjang}}</td>
                                <td>@currency($item->transaksi->gross_amount)</td>
                                <td>{{$item->status_pesanan}}</td>
                                <td>{{$item->status_pengiriman}}</td>
                                <td>Aksi</td>
                        </tr>
                        @endforeach
                    </tbody>
                @endif
            </table>
        </div>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
    @endif

</div>

@endsection