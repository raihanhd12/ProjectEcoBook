<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Category;

class KeranjangUserController extends Controller
{
    public function indexKeranjang()
    {
        $keranjangUser = Keranjang::where('user_id', '=', auth()->user()->id)->where('level', '=', 1)->latest()->get();
        $ct = Category::all();
        return view('user.keranjang.home_keranjang', [
            'cate' => $ct,
            'keSer' => $keranjangUser
        ]);
    }

    public function storeToTransaksi(Request $request)
    {

    }

    public function deleteKeranjang($id)
    {
        $kera = Keranjang::find($id);

        $kera->delete();
        return redirect()->route('user.keranjangUser')->with('success', 'Item Berhasil Dihapus');
    }
}
