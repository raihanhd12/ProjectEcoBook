@extends('layouts.navbar_admin')

@section('navbar-admin')

<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Category</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{route('admin-category.update', $data->id)}}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Category</label>
                <input type="text" name="nama_category" value="{{ old('nama_category', $data->nama_category)}}"
                    class="form-control @error('nama_category') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                @error('nama_category')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-danger" href="/admin-category">Cancel</a>
        </form>
    </div>

    @endsection
