@extends('layouts.navbar_admin')

@section('navbar-admin')

<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Show Course</h6>
    </div>
    @if (is_null($dataVerifikasi))
        <div class="card-body">
            <h1>Pejual Belum Melakukan Verifikasi</h1>
        </div>
    @else
        <div class="card-body">

            <h3>Nama Depan Penjual Adalah:  <b>{{$dataPenjual->first_name}}</b></h3>
            <h3>Nama Belakang Penjual Adalah:  <b>{{$dataPenjual->last_name}}</b></h3>
            <h3>Nama Toko Penjual Adalah:  <b>{{$dataPenjual->nama_toko}}</b></h3>
            <hr>
            <h1>Detail Toko</h1>
            <h3>Lokasi Toko Penjual Adalah:  <b>{!!$dataVerifikasi->lokasi_toko!!}</b></h3>
            <h4>Foto Toko</h4>
            <div style="width:50%">
                <img class="img-fluid" src="{{asset('storage/' . $dataVerifikasi->foto_toko)}}" alt="">
            </div>
            <br>
            <h4>Sertefikat Toko</h4>
            <div style="width:50%">
                <img class="img-fluid" src="{{asset('storage/' . $dataVerifikasi->sertefikat_toko)}}" alt="">
            </div>
            <h4>Foto Toko</h4>
            <div style="width:50%">
                <img class="img-fluid" src="{{asset('storage/' . $dataVerifikasi->foto_ktp)}}" alt="">
            </div>
            <hr>
            <a class="btn btn-danger" href="/verifikasi-penjual">Back</a>
        </div>
    @endif
</div>

@endsection
