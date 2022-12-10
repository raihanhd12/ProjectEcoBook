<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Category;
use App\Models\Keranjang;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\DB;

class ProdukBukuController extends Controller
{
    public function getBuku($id)
    {
        $getDataB = Buku::where('id', '=', $id)->first();
        $bukuA = Buku::all();
        return view('user.product.get_buku', [
            'getDB' => $getDataB,
            'bukuAcak' => $bukuA->random(3)->all()
        ]);
    }

    public function productAll()
    {
        $allB = Buku::latest();
        $cate = request('cate');
        if (request('search')) {
            $allB->where('nama_buku', 'like', '%' .request('search') . '%');
        } elseif (request('cate')) {
            $allB->where('id_category', '=', $cate);
        }
        return view('user.product.all_product', [
            'allBuku' => $allB->paginate(6),
            'allCate' => Category::all()
        ]);
    }

    public function showByCate($id)
    {
        $dataBook = Buku::where('id_category', '=', $id)->paginate(6);
        return view('user.product.by_cate',[
            'datBook' => $dataBook,
            'allCat' => Category::all()
        ]);
    }

    public function storeToKeranjang(Request $request)
    {
        $validasi = $request->validate([
            'buku_id' => 'required',
            'user_id' => 'required',
            'penjual_id' => 'required',
            'quantity' => 'required'
        ]);
        Keranjang::create($validasi);
        return redirect()->route('user.keranjangUser')->with('success', 'Produk Berhasil Ditambahkan Ke Dalam Keranjang Anda');
    }
}
