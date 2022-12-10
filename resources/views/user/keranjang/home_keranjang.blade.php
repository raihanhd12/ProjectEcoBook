@extends('layouts.navbar_user')

@section('navbar-user')

@if (session()->has('success'))
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="alert alert-success alert-dismissible fade show justify-content-center" role="alert">
            <strong>Suksess </strong>{{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif
<!-- cart -->
<div class="cart-section mt-100 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-remove">Aksi</th>
                                <th class="product-image">Product Image</th>
                                <th class="product-name">Nama Buku</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keSer as $keranjang)
                            <tr class="table-body-row">
                                <td class="product-remove">
                                    <form action="{{route('keranjangUser.delete', $keranjang->id)}}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit"
                                            onclick="return confirm('Yakin Ingin Hapus Buku Ini Dari Keranjang?')">
                                            <i class="far fa-window-close"></i>
                                        </button>
                                    </form>
                                </td>
                                <td class="product-image"><img
                                        src="{{asset('storage/' .$keranjang->buku->gambar_buku)}}" alt=""></td>
                                <td class="product-name">{{$keranjang->buku->nama_buku}}</td>
                                <td class="product-price">Rp. @currency($keranjang->buku->harga_buku)</td>
                                <td class="product-quantity"><input type="number" value="{{$keranjang->quantity}}"
                                        disabled></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="input-group">
                    <select class="custom-select" id="inputGroupSelect04" name="cate"
                        aria-label="Example select with button addon">
                        <option selected value="">Chose</option>
                        @foreach ($keSer as $item)
                        <option value="{{$item->id}}">{{$item->buku->nama_buku}}</option>
                        @endforeach
                    </select>
                </div>
                @foreach ($keSer as $item2)
                <div class="total-section mt-5" id="{{$item2->id}}">
                    <table class="total-table">
                        <thead class="total-table-head">
                            <tr class="table-total-row">
                                <th>Total</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="total-data">
                                <td><strong>Hagra Buku: </strong></td>
                                <td>Rp. @currency($item2->buku->harga_buku)</td>
                            </tr>
                            <tr class="total-data">
                                <td><strong>Banyak Buku: </strong></td>
                                <td>{{$item2->quantity}}</td>
                            </tr>
                            <tr class="total-data">
                                <td><strong>Total Keseluruhanya: </strong></td>
                                <td>Rp. @currency($item2->quantity * $item2->buku->harga_buku)</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="cart-buttons">
                        <a href="{{route('user.transaksiUser', $item2->id)}}" class="boxed-btn black">Check Out</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script src="{{asset('user/assets/js/jquery-1.11.3.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('select[name="cate"]').on('change', function () {
            $(".total-section").hide();
            $("#" + $(this).val()).fadeIn(700);
        }).change();
    });

</script>
@endsection
