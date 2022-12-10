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
                @if (is_null($dataPesanan) || $dataPesanan->isEmpty())
                    <h2>Anda Belum Mempunyai Produk Buku</h2>
                @else
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pembeli</th>
                            <th>Nama Buku</th>
                            <th>Quantity</th>
                            <th>Total Harga</th>
                            <th>Waktu Beli</th>
                            <th>ID Order</th>
                            <th>Status pembelian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataPesanan as $item)
                        <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->first_name_keranjang}}</td>
                                <td>{{$item->nama_buku_keranjang}}</td>
                                <td>{{$item->quantity_keranjang}}</td>
                                <td>@currency($item->gross_amount)</td>
                                <td>{{$item->transaction_time}}</td>
                                <td>{{$item->order_id}}</td>
                                <td>
                                    @if ($item->status === "settlement")
                                        <span class="badge badge-success">Suksess</span>
                                    @elseif ($item->status === "pending")
                                        <span class="badge badge-warning">Waiting</span>
                                    @elseif ($item->status === "failure")
                                        <span class="badge badge-danger">Failed</span>
                                    @endif
                                </td>
                                <td>
                                <form action="{{route('penjual.list.t.store')}}" method="post" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="penjual_id" value="{{Auth::guard('webpenjual')->user()->id}}">
                                    <input type="hidden" name="transaksi_id" value="{{$item->id}}">
                                    <input type="hidden" name="first_name_keranjang" value="{{$item->first_name_keranjang}}">
                                    <input type="hidden" name="status_pesanan" value="Diterima">
                                    <button type="submit" class="btn btn-success"
                                        onclick="return confirm('Yakin Ingin  Menerima Pesanan Ini?')">Terima Pesanan</button>
                                </form>
                                <form action="{{route('penjual.list.t.store')}}" method="post" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="penjual_id" value="{{Auth::guard('webpenjual')->user()->id}}">
                                    <input type="hidden" name="transaksi_id" value="{{$item->id}}">
                                    <input type="hidden" name="first_name_keranjang" value="{{$item->first_name_keranjang}}">
                                    <input type="hidden" name="status_pesanan" value="Ditolak">
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Yakin Ingin Tolak Pesanan Ini?')">Tolak Pesanan</button>
                                </form>
                            </td>
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