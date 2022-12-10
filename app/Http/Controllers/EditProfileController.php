<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penjual;

class EditProfileController extends Controller
{
    public function eProfilePenjual($id)
    {
        $dataPenjual = Penjual::find($id);
        return view('penjual.edit-profile.edit_profile', compact('dataPenjual'));
    }

    public function prosesProfilePenjual(Request $req, $id)
    {
        $validasi = $req->validate([
            'first_name' => 'min:3|max:50',
            'last_name' => 'min:3|max:50',
            'nama_toko' => 'min:3|max:50',
            'email' => 'min:3|max:50'
        ]);
        Penjual::where('id', $id)->update($validasi);

        return redirect()->route('penjual.indexPenjual')->with('success', 'Update Profile Berhasil Dilakukan');
    }
}
