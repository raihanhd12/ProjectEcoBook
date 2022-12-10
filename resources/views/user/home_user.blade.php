@extends('layouts.navbar_user')

@section('navbar-user')

@if (session()->has('success'))
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="alert alert-success alert-dismissible fade show justify-content-center" role="alert">
            <strong>Sukses </strong>{{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif

<!-- product section -->
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Our</span> New Products</h3>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($dataB as $item)
            <div class="col-lg-4 col-md-6 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="{{route('user.getProductBuku', $item->id)}}"><img
                                src="{{asset('storage/' .$item->gambar_buku)}}" alt=""></a>
                    </div>
                    <h3>{{$item->nama_buku}}</h3>
                    <p class="product-price">@currency($item->harga_buku)</p>
                    <a href="/home/user/product/buku/{{ $item->id }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
