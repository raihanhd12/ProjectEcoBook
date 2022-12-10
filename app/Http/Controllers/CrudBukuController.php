<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CrudBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('penjual.crud-buku.index', [
            'dataB' => Buku::where('id_penjual', '=', auth()->guard('webpenjual')->user()->id)->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penjual.crud-buku.create', [
            "dataC" => Category::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'id_penjual' => 'required',
            'id_category' => 'required',
            'nama_buku' => 'required|min:5|max:50',
            'author_buku' => 'required|min:5|max:50',
            'penerbit_buku' => 'required|min:5|max:50',
            'tahun_terbit' => 'required|date',
            'harga_buku' => 'required',
            'gambar_buku' => 'required|mimes:jpg,png,jpeg|max:5048',
            'deskripsi_buku' => 'required|min:10|max:3000'
        ]);


        if ($request->file('gambar_buku')) {
            $validasiData['gambar_buku'] = $request->file('gambar_buku')->store('gambar-buku'); 
        }

        // dd($validasiData);
        
        Buku::create($validasiData);
        return redirect()->route('penjual.crud.buku')->with('success', 'Penambahan Produk Buku Anda Berhasil Dilakukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataBuku = Buku::find($id);
        return view('penjual.crud-buku.show',compact('dataBuku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dBuku = Buku::find($id);
        $dCate = Category::latest()->get();
        return view('penjual.crud-buku.edit',compact('dBuku'), [
            "dataCate" => $dCate
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasiData = $request->validate([
            'id_penjual' => '',
            'id_category' => '',
            'nama_buku' => 'min:5|max:50',
            'author_buku' => 'min:5|max:50',
            'penerbit_buku' => 'min:5|max:50',
            'tahun_terbit' => 'date',
            'harga_buku' => '',
            'gambar_buku' => 'mimes:jpg,png,jpeg|max:5048',
            'deskripsi_buku' => 'min:10|max:3000'
        ]);

        if ($request->file('gambar_buku')) {
            if ($request->oldGambarBuku) {
                Storage::delete($request->oldGambarBuku);
            }
            $validasiData['gambar_buku'] = $request->file('gambar_buku')->store('gambar-buku'); 
        }
        Buku::where('id', $id)->update($validasiData);

        return redirect()->route('penjual.crud.buku')->with('success', 'Perubahan Produk Buku Anda Berhasil Dilakukan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);

        if ($buku->thumbnail) {
            Storage::delete($buku->thumbnail);
        }

        $buku->delete();
        return redirect()->route('penjual.crud.buku')->with('success', 'Penghapusan Produk Buku Anda Berhasil Dilakukan');
    }
}
