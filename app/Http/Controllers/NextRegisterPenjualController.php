<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NextRegister;
use App\Models\Penjual;

class NextRegisterPenjualController extends Controller
{
    public function createVerifikasi()
    {
        return view('penjual.verifikasi-penjual.index');

    }

    public function storeVerifikasi(Request $request)
    {
        $validasiData = $request->validate([
            'penjual_id' => 'required',
            'lokasi_toko' => 'required|min:10|max:199',
            'foto_toko' => 'required|mimes:jpg,png,jpeg|max:5048',
            'foto_ktp' => 'required|mimes:jpg,png,jpeg|max:5048',
            'sertefikat_toko' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);

        if ($request->file('foto_toko')) {
            $validasiData['foto_toko'] = $request->file('foto_toko')->store('FotoToko'); 
        }
        if ($request->file('foto_ktp')) {
            $validasiData['foto_ktp'] = $request->file('foto_ktp')->store('KtpPenjual'); 
        }
        if ($request->file('sertefikat_toko')) {
            $validasiData['sertefikat_toko'] = $request->file('sertefikat_toko')->store('SertefikatTokoPenjual'); 
        }
        NextRegister::create($validasiData);
        return redirect()->route('penjual.indexPenjual')->with('success', 'Verifikasi Berhasil Dilakukan, Mohon Menunggu Dalam Waktu 1x24 Jam');

    }

}
