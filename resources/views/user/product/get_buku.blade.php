@extends('layouts.navbar_user')

@section('navbar-user')

@if ($errors->any())
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="alert alert-danger alert-dismissible fade show justify-content-center" role="alert">
                    <strong>Gagal</strong>Ada Beberapa Kesalahan
                    @foreach ($errors->all() as $err)
                        <li>
                            {{$err}}
                        </li>
                    @endforeach
                    <p></p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @endif

<form action="{{route('store.keranjang')}}" method="POST">
    @csrf
    <div class="single-product mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="single-product-img">
                        <img src="{{asset('storage/' .$getDB->gambar_buku)}}" alt="">
                    </div>
                </div>
                <input type="hidden" name="buku_id" value="{{$getDB->id}}">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="penjual_id" value="{{$getDB->id_penjual}}">

                <div class="col-md-7">
                    <div class="single-product-content">
                        <h3>{{$getDB->nama_buku}}</h3>
                        <p class="single-product-pricing"><span>Harga Buku</span> Rp. @currency($getDB->harga_buku)</p>
                        {!!$getDB->deskripsi_buku!!}
                        <br>
                        <div class="single-product-form">
                            <form action="index.html">
                                <input type="number" name="quantity" placeholder="0">
                            </form>
                            <button class="cart-btn" type="submit" onclick="return confirm('Yakin Ingin Membeli Buku Ini?')"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                            <p><strong>Categories: </strong>{{$getDB->category->nama_category}}</p>
                            <p><strong>Nama Toko: </strong>{{$getDB->penjual->nama_toko}}</p>
                        </div>
                        <h4>Share:</h4>
                        <ul class="product-share">
                            <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href=""><i class="fab fa-twitter"></i></a></li>
                            <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

    <div class="more-products mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Produk</span> Lainya</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
                            beatae optio.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @if ($bukuAcak <= 3)
                    <h1>Kosong</h1>
                @else
                    @foreach ($bukuAcak as $item)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{route('user.getProductBuku', $item->id)}}"><img src="{{asset('user/assets/img/products/product-img-1.jpg')}}"
                                        alt=""></a>
                            </div>
                            <h3>{{$item->nama_buku}}</h3>
                            <p class="product-price">Rp. @currency($item->harga_buku)</p>
                            <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

@endsection
