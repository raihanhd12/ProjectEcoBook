<?php

namespace App\Http\Controllers;

use App\Models\Kurir;
use App\Http\Controllers\Controller;
use App\Models\Penjual;
use Illuminate\Http\Request;

class KurirController extends Controller
{
    public function index(Penjual $penjual)
    {
        return view('admin.kurir.home_kurir', [
            'kurir' => Kurir::latest()->get(),
            
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
        return view('admin.kurir.create_kurir', [
            "dataP" => Penjual::latest()->get()
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
            'penjual_id' => 'required',
            'nama_kurir' => 'required|min:2',
            'harga' => 'required'
        ]);

        Kurir::create($validasiData);
        return redirect()->route('admin.kurir')->with('success', 'Penambahan Kurir Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kurir  $kurir
     * @return \Illuminate\Http\Response
     */
    public function show(Kurir $kurir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kurir  $kurir
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = Kurir::find($id);
        $dataPenjual = Penjual::latest()->get();
        return view('admin.kurir.edit_kurir', compact('data'),[
            "dataPenjual" =>$dataPenjual
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kurir  $kurir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasiData = $request->validate([
            'penjual_id' => 'required',
            'nama_kurir' => 'required|min:2',
            'harga' => 'required'
        ]);

        Kurir::find($id)->update($request->all());

        return redirect()->route('admin.kurir')->with('success', 'Edit Kurir Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kurir  $kurir
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kurir::find($id)->delete();

        return redirect()->route('admin.kurir')->with('success', 'Hapus Kurir Berhasil');
    }
}
