@extends('layouts.navbar_user')

@section('navbar-user')
<br>
<br>
<h3><b><center>HISTORY BELANJA ANDA</center></b></h3>

<div class="cart-section mt-150 mb-150">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-remove"></th>
                                <th class="product-name">Nama Buku</th>
                                <th class="product-quantity">Quantity Buku</th>
                                <th class="product-price">Harga Buku</th>
                                <th class="product-price">Total Harga Buku</th>
                                <th class="product-name">Nama Penjual</th>
                                <th class="product-price">Status Pesanan</th>
                                <th class="product-quantity">Status Pengiriman</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($dataP->isEmpty())
                                <tr>
                                    <td>Anda Belum Melakukan Transaksi</td>
                                </tr>
                            @else
                                @foreach ($dataP as $item)
                                    <tr class="table-body-row">
                                        <td class="product-remove">{{$loop->iteration}}</td>
                                        <td class="product-name">{{$item->transaksi->nama_buku_keranjang}}</td>
                                        <td class="product-quantity disabled">{{$item->transaksi->quantity_keranjang}}</td>
                                        <td class="product-price">Rp. @currency($item->transaksi->price_keranjang)</td>
                                        <td class="product-price">Rp. @currency($item->transaksi->gross_amount)</td>
                                        <td class="product-name">{{$item->penjual->first_name}}</td>
                                        <td class="product-name">
                                            @if ($item->status_pesanan === "Diterima")
                                                <span class="badge badge-success">Diterima</span>
                                            @elseif($item->status_pesanan === "Ditolak") 
                                                <span class="badge badge-danger">Ditolak</span>
                                            @endif
                                        </td>
                                        <td class="product-name">{{$item->status_pengiriman}}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
