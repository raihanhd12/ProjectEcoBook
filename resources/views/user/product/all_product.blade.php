@extends('layouts.navbar_user')

@section('navbar-user')

<!-- products -->
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-md-6">
                <form action="/home/user/product/allBuku">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" value="{{request('search')}}" placeholder="Masukan Nama Buku"
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-danger" type="submit" id="button-addon2">Cari Nama Buku</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- <div class="row justify-content-center mb-5">
            <div class="col-md-6">
                <form action="/home/user/product/allBuku">
                    <div class="input-group">
                        <select class="custom-select" id="inputGroupSelect04" name="cate"
                            aria-label="Example select with button addon">
                            @foreach ($allCate as $item3)
                                <option value="{{$item3->id}}">{{$item3->nama_category}}</option>
                            @endforeach   
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-primary" submit="button">Cari Kategori</button>
                        </div>
                    </div>
                </form>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-md-12">
                <div class="product-filters">
                    <center>
                        <h3>Filter Buku</h3>
                    </center>
                    <ul>
                        <li class="{{ Request::is('home/user/product/allBuku') ? 'active' : ''}}">
                            <a href="/home/user/product/allBuku" style="color: black">All</a></li>
                        @foreach ($allCate as $item3)
                        <li class="{{ Request::is('home/user/product/allBuku/cate/{$item3->id}') ? 'active' : ''}}">
                            <a href="{{route('allBuku.cate', $item3->id)}}" style="color: black">{{$item3->nama_category}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="row product-lists">
            @if ($allBuku->isEmpty())
                @include('error.not_found')
            @else
                @foreach ($allBuku as $item)
                <div class="col-lg-4 col-md-6 text-center strawberry">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="{{route('user.getProductBuku', $item->id)}}"><img
                                    src="{{asset('storage/' .$item->gambar_buku)}}" alt=""></a>
                        </div>
                        <h3>{{$item->nama_buku}}</h3>
                        <p class="product-price">Rp. @currency($item->harga_buku)</p>
                        <a href="/home/user/product/buku/{{ $item->id }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
        {{$allBuku->links('paginate.paginate_user')}}
        {{-- <div class="d-flex justify-content-end">
            {{$allBuku->links()}}
    </div> --}}
</div>
</div>

@endsection
