@extends('layouts.navbar_admin')

@section('navbar-admin')

<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Create Kurir</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{route('admin-kurir.store')}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Toko</label>
                <select class="form-control" name="penjual_id" id="exampleFormControlSelect1">
                    <option selected>Choose..</option>
                    @foreach ($dataP as $item)
                    @if (old('penjual_id') == $item->id)
                    <option value="{{$item->id}}" selected>{{$item->nama_toko}}</option>
                    @else
                    <option value="{{$item->id}}">{{$item->nama_toko}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Kurir</label>
                <input type="text" name="nama_kurir" value="{{ old('nama_kurir')}}"
                    class="form-control @error('nama_kurir') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                @error('nama_kurir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Harga Kurir</label>
                <input type="number" name="harga" value="{{ old('harga')}}"
                    class="form-control @error('harga') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                @error('harga')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-danger" href="/admin-kurir">Cancel</a>
        </form>
    </div>

    @endsection