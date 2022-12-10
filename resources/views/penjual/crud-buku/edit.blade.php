@extends('layouts.navbar_penjual')

@section('navbar-penjual')

<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Masukan Produk Buku Anda</h6>
    </div>
    <div class="card-body">
        <form action="{{route('penjual-crud-buku.update', $dBuku->id)}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="hidden" name="id_penjual" value="{{Auth::guard('webpenjual')->user()->id}}">
            
            <div class="form-group">
                <label for="exampleInputEmail1">Category Buku</label>
                <select class="form-control" name="id_category" id="exampleFormControlSelect1">
                    <option selected>Chose..</option>
                    @foreach ($dataCate as $item)
                    @if (old('id_category', $dBuku->id_category) == $item->id)
                    <option value="{{$item->id}}" selected>{{$item->nama_category}}</option>
                    @else
                    <option value="{{$item->id}}">{{$item->nama_category}}</option>
                    @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Nama Buku</label>
                <input type="text" name="nama_buku" value="{{ old('nama_buku', $dBuku->nama_buku)}}"
                    class="form-control @error('nama_buku') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                @error('nama_buku')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Author Buku</label>
                <input type="text" name="author_buku" value="{{ old('author_buku', $dBuku->author_buku)}}"
                    class="form-control @error('author_buku') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                @error('author_buku')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Penerbit Buku</label>
                <input type="text" name="penerbit_buku" value="{{ old('penerbit_buku', $dBuku->penerbit_buku)}}"
                    class="form-control @error('penerbit_buku') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                @error('penerbit_buku')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Tahun Terbit</label>
                <input type="date" name="tahun_terbit" value="{{ old('tahun_terbit', $dBuku->tahun_terbit)}}"
                    class="form-control @error('tahun_terbit') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                @error('tahun_terbit')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Harga Buku</label>
                <input type="number" name="harga_buku" value="{{ old('harga_buku', $dBuku->harga_buku)}}"
                    class="form-control @error('harga_buku') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                @error('harga_buku')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Gambar Buku</label>
                <input type="hidden" name="oldGambarBuku" value="{{$dBuku->gambar_buku}}">
                @if ($dBuku->gambar_buku)
                    <img src="{{asset('storage/' . $dBuku->gambar_buku)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input type="file" name="gambar_buku" value="{{ old('gambar_buku')}}"
                    class="form-control @error('gambar_buku') is-invalid @enderror" id="thumbnail"
                    aria-describedby="emailHelp" onchange="previewImage()">
                @error('gambar_buku')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Deskrispi Buku</label>
                <input id="deskripsi_buku" type="hidden" name="deskripsi_buku" value="{{old('deskripsi_buku', $dBuku->deskripsi_buku)}}">
                <trix-editor input="deskripsi_buku"></trix-editor>
                @error('deskripsi_buku')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector('#thumbnail');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);

            ofReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

    </script>
    @endsection
