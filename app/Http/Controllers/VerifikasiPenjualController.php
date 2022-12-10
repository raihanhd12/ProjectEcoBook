<?php

namespace App\Http\Controllers;

use App\Models\Penjual;
use App\Models\NextRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerifikasiPenjualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.verifikasi.home_verifikasi_penjual', [
            "verifikasi" => Penjual::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjual  $penjual
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataPenjual = Penjual::find($id);
        $dataVerifikasi = NextRegister::where('penjual_id', '=', $id)->first();
        return view('admin.verifikasi.read_data_verifikasi_penjual', compact('dataPenjual', 'dataVerifikasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjual  $penjual
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjual $penjual)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjual  $penjual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasiData = $request->validate([
            'level' => 'max:1'
        ]);

        Penjual::find($id)->update($request->all());

        return redirect()->route('admin.verifikasi.penjual')->with('success', 'Akun Ini Diperbolehkan Login Ke Sistem');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjual  $penjual
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjual $penjual)
    {
        //
    }
}
