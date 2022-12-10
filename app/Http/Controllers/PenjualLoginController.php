<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Category;
use App\Models\Penjual;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PenjualLoginController extends Controller
{
    public function homePenjual()
    {
        $dCate = Category::all();
        $countBk = Buku::where('id_penjual', '=', auth()->guard('webpenjual')->user()->id)->get();
        $sumT = Transaksi::where('penjual_id', '=', auth()->guard('webpenjual')->user()->id)->get()->count();
        $totalT = Transaksi::where('penjual_id', '=', auth()->guard('webpenjual')->user()->id)->get()->sum('gross_amount');
        $dataTable = DB::select('SELECT categories.nama_category,
        COUNT(bukus.id_category) AS `hasil_cate`
        FROM bukus
        RIGHT OUTER JOIN categories ON bukus.id_category = categories.id
        WHERE bukus.id_penjual = '.auth()->guard('webpenjual')->user()->id.'
        GROUP BY categories.nama_category
        ORDER BY bukus.id_category');
        $dataNamaCate = [];
        $dataCountCate = [];
        foreach ($dataTable as $key ) {
            $dataNamaCate[] = $key->nama_category;
            $dataCountCate[] = $key->hasil_cate;
        }
        // dd($dataTable);
        return view('penjual.home', [
            "hitungBk" => $countBk,
            "hitungSumT" => $sumT,
            "hasilT" => $totalT,
            "dCate" => $dCate,
            "dataNamaCate" => $dataNamaCate,
            "dataCountCate" => $dataCountCate
        ]);
        
    }

    public function loginPenjual()
    {
        return view('penjual.login');
    }

    public function registerPenjual()
    {
        return view('penjual.register');
    }

    public function prosesLoginPenjual(Request $request)
    {
        $validasi = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8'
        ]);

        if (Auth::guard('webpenjual')->attempt($validasi)) {
            $request->session()->regenerate();
            return redirect()->route('penjual.indexPenjual');
        }   
        return back()->with('gagalLogin', 'Anda Gagal Melakukan Login ');
    }

    public function logoutPenjual()
    {
        Auth::guard('webpenjual')->logout();
        return redirect()->route('penjual.loginPenjual');
    }

    public function registerP(Request $request)
    {
        $pw = $request->input('password');
        $validasi = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'nama_toko' => 'required',
            'email' => 'required|email:dns|unique:penjuals',
            'password' => 'required'
        ]);
        $validasi['password'] = bcrypt($pw);

        Penjual::create($validasi);
        return redirect()->route('penjual.loginPenjual')->with('success', 'Register Penjual Berhasil Dilakukan');        
    }
}
