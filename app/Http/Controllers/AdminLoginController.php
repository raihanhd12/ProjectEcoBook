<?php

namespace App\Http\Controllers;

use App\Models\Penjual;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function home()
    {
        $u = User::all()->count();
        $p = Penjual::all()->count();
        $t = $u + $p;
        $ps = Penjual::where('level', '2')->get()->count();
        $tr = Transaksi::all()->sum('gross_amount');
        return view('admin.home_admin', [
            'totalAll' => $t,
            'totalToko' => $ps,
            'totalTransaksi' => $tr
        ]);
    }

    public function index()
    {
        return view('admin.login_admin');
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8'
        ]);

        if (Auth::guard('webadmin')->attempt($validasi)) {
            $request->session()->regenerate();
            return redirect()->route('admin.homeAdmin');
        }   
        return back()->with('gagalLogin', 'Anda Gagal Melakukan Login ');
    }

    public function logoutAdmin(Request $request)
    {
        Auth::guard('webadmin')->logout();
        return redirect()->route('login-admin');
    }

}
