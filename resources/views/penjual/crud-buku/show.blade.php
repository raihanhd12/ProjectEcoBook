@extends('layouts.navbar_penjual')

@section('navbar-penjual')

<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Show Course</h6>
    </div>
        <div class="card-body">

            <h4>Nama Buku</h4>
            <p>{{$dataBuku->nama_buku}}</p>
            <hr>

            <h4>Author Buku</h4>
            <p>{{$dataBuku->author_buku}}</p>
            <hr>
            
            <h4>Penerbit Buku</h4>
            <p>{{$dataBuku->penerbit_buku}}</p>
            <hr>

            <h4>Tahun Buku</h4>
            <p>{{$dataBuku->tahun_terbit}}</p>
            <hr>

            <h4>Harga Buku</h4>
            <p>{{$dataBuku->harga_buku}}</p>
            <hr>

            <h4>Category Buku</h4>
            <p>{{$dataBuku->category->nama_category}}</p>
            <hr>

            <h4>Gambar Buku</h4>
            <div style="width:50%">
                <img class="img-fluid" src="{{asset('storage/' . $dataBuku->gambar_buku)}}" alt="">
            </div>
            <hr>

            <h4>Deskripsi Buku</h4>
            {!! $dataBuku->deskripsi_buku !!}
            <hr>

            <a class="btn btn-danger" href="/penjual-crud-buku">Back</a>
    </div>
</div>

@endsection
