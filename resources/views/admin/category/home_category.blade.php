@extends('layouts.navbar_admin')

@section('navbar-admin')

<h1 class="h3 mb-2 text-gray-800">Data Category</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Category</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Category</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)
                    <tr>
                        <td>{{$loop->iteration }}</td>
                        <td>{{$item->nama_category}}</td>
                        <td>
                            <a href="{{route('admin.category.edit', $item->id)}}"
                                class="btn btn-primary btn-circle btn-sm">
                                <i class="fas fa-solid fa-marker"></i>
                            </a>
                            <form action="{{route('admin-category.destroy', $item->id)}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" onclick="return confirm('Yakin Ingin Hapus Kategori {{$item->nama_category}}?')"
                                    class="btn btn-primary btn-circle btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<a class="btn btn-primary" href="/admin-category/create">Create</a>
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@endsection
