@extends('layouts.navbar_penjual')

@section('navbar-penjual')

<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Update Profile Penjual</h6>
    </div>
    <div class="card-body">
        <form action="{{route('penjual.proses.eProfile', $dataPenjual->id)}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <input type="text" name="first_name" value="{{ old('first_name', $dataPenjual->first_name)}}"
                    class="form-control @error('first_name') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                @error('first_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Last Name</label>
                <input type="text" name="last_name" value="{{ old('last_name', $dataPenjual->last_name)}}"
                    class="form-control @error('last_name') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                @error('last_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Nama Toko</label>
                <input type="text" name="nama_toko" value="{{ old('nama_toko', $dataPenjual->nama_toko)}}"
                    class="form-control @error('nama_toko') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                @error('nama_toko')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" name="email" value="{{ old('email', $dataPenjual->email)}}"
                    class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>

    @endsection
