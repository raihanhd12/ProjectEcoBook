<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Buku;
use Laravel\Socialite\Facades\Socialite;

class UserLoginController extends Controller
{
    public function home()
    {
        if (auth()->user()->level == 2) {
            return view('user.home_user', [
                'dataB' => Buku::latest()->limit(3)->get()
            ]);   
        }
        elseif(auth()->user()->level == 3){
            Auth::logout();
            return redirect()->route('login-user')->with('error', 'Akun Anda Di Nonaktifkan Admin');
        }
        else{
            Auth::logout();
            return redirect()->route('login-user');
        }
    }

    public function index()
    {
        return view('user.login_user');
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt($validasi)) {
            $request->session()->regenerate();

            return redirect()->intended('/home/user');
        }   
        return back()->with('gagalLogin', 'Anda Gagal Melakukan Login ');
    }

    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();

            $user = User::where('google_id', $google_user->id)->first();

            if (!$user) {
                $new_user = User::create([
                    'first_name' => $google_user->name,
                    'email' => $google_user->email,
                    'google_id' => $google_user->id
                ]);
                    Auth::login($new_user);
                    return redirect()->intended('/home/user');
            } else {
                Auth::login($user);
                return redirect()->intended('/home/user');
            }
        } catch (\Throwable $th) {
            dd('Ada Yang Salah'. $th->getMessage());
        }
    }

    public function logoutUser(Request $request)
    {
        Auth::logout();
        return redirect()->route('login-user');
    }

    public function homeRegister()
    {
        return view('user.register_user');
    }

    public function prosesRegister(Request $request)
    {
        $validasiData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8',
        ]);
        $validasiData['password'] = bcrypt($validasiData['password']);
        User::create($validasiData);
        return redirect()->route('login-user')->with('success', 'Anda Berhasil Membuat Akun, Silahkan Login !');
    }

    public function aboutUser()
    {
        return view('user.about_user');
    }
}
