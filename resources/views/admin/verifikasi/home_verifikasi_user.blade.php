@extends('layouts.navbar_admin')

@section('navbar-admin')

<h1 class="h3 mb-2 text-gray-800">Data Pembeli</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pembeli</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Depan</th>
                        <th>Nama Belakang</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($verifikasi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$item->first_name}}</td>
                        <td>{{$item->last_name}}</td>
                        @if ($item->level === 2)
                            <td><button class="btn btn-success">Verifikasi</button></td>
                        @elseif($item->level === 1)
                            <td><button class="btn btn-warning">Menunggu</button></td>
                        @elseif($item->level === 3)
                            <td><button class="btn btn-danger">Non Aktif</button></td>
                        @else
                            <td><button class="btn btn-light">Null</button></td>
                        @endif
                        <td>
                            <form class="d-inline" method="POST" action="{{route('verifikasi-user.update', $item->id)}}">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="level" value="3">
                                <button class="btn btn-danger">Non Aktifkan</button>
                            </form>
                            <form class="d-inline" method="POST" action="{{route('verifikasi-user.update', $item->id)}}">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="level" value="2">
                                <button class="btn btn-success">Aktifkan</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
    @endif

</div>

@endsection
