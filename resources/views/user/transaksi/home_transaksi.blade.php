@extends('layouts.navbar_user')

@section('navbar-user')

<!-- check out section -->
<div class="checkout-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-accordion-wrap">
                    <div class="accordion" id="accordionExample">
                        <div class="card single-accordion">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Transaksi
                                    </button>
                                </h5>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="order-details-wrap">
                    <table class="order-details">
                        <thead>
                            <tr>
                                <th>Pesananmu</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody class="order-details-body">
                            <tr>
                                <td>Nama Buku</td>
                                <td>{{$gtKeranjang->buku->nama_buku}}</td>
                            </tr>
                            <tr>
                                <td>Quantity</td>
                                <td>{{$gtKeranjang->quantity}}</td>
                            </tr>
                            <tr>
                                <td>Harga Satuan</td>
                                <td>Rp. @currency($gtKeranjang->buku->harga_buku)</td>
                            </tr>
                            <tr>
                                <td>Total Keseluruhanya</td>
                                <td>Rp. @currency($gtKeranjang->buku->harga_buku * $gtKeranjang->quantity)</td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <form action="{{route('user.transaksiUserLanjut')}}" method="GET">
                        @csrf
                        <a href="{{url('/home/user/keranjang')}}" class="boxed-btn">Kembali</a>
                        <input type="hidden" name="id_transaksi" value="{{$gtKeranjang->id}}">
                        <input type="hidden" name="penjual_id" value="{{$gtKeranjang->penjual_id}}">
                        <input type="hidden" name="nama_buku_keranjang" value="{{$gtKeranjang->buku->nama_buku}}">
                        <input type="hidden" name="quantity_keranjang" value="{{$gtKeranjang->quantity}}">
                        <input type="hidden" name="price_keranjang" value="{{$gtKeranjang->buku->harga_buku}}">
                        <input type="hidden" name="first_name_keranjang" value="{{auth()->user()->first_name}}">
                        <input type="hidden" name="last_name_keranjang" value="{{auth()->user()->last_name}}">
                        <input type="hidden" name="email_keranjang" value="{{auth()->user()->email}}">
                        <button type="submit" class="boxed-btn">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
