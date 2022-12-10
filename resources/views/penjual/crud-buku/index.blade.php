@extends('layouts.navbar_penjual')

@section('navbar-penjual')

<h1 class="h3 mb-2 text-gray-800">Data Course</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Course</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                @if (is_null($dataB) || $dataB->isEmpty())
                    <h2>Anda Belum Mempunyai Produk Buku</h2>
                @else
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Buku</th>
                            <th>Author Buku</th>
                            <th>Penerbit Buku</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataB as $item)
                        <tr>
                            <td>{{$loop->iteration }}</td>
                            <td>{{$item->nama_buku}}</td>
                            <td>{{$item->author_buku}}</td>
                            <td>{{$item->penerbit_buku}}</td>
                            <td>
                                <a class="btn btn-secondary" href="{{route('penjual-crud-buku.show', $item->id)}}">Show</a>
                                <a class="btn btn-primary" href="{{route('penjual.crud.buku.edit', $item->id)}}">Edit</a>
                                <form action="{{route('penjual-crud-buku.destroy', $item->id)}}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Yakin Ingin Hapus Course Ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                @endif
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