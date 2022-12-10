<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\VerifikasiPenjualController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProdukBukuController;
use App\Http\Controllers\PenjualLoginController;
use App\Http\Controllers\NextRegisterPenjualController;
use App\Http\Controllers\CrudBukuController;
use App\Http\Controllers\LatihanPaymentController;
use App\Http\Controllers\KeranjangUserController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\KurirController;
use App\Http\Controllers\EditProfileController;
use App\Models\Buku;
use App\Models\Penjual;
use App\Models\Category;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $cU = User::latest()->get()->count();
    $cP = Penjual::latest()->get()->count();
    $total = $cU + $cP;
    return view('welcome', [
        'cBuku' => Buku::latest()->get()->count(),
        'cPenjual' => Penjual::latest()->get()->count(),
        'cCategory' => Category::latest()->get()->count(),
        'cUser' => $total
    ]);
});

Route::get('/latihan/form',[LatihanPaymentController::class, 'indexForm']);
Route::get('/latihan/home',[LatihanPaymentController::class, 'index']);
Route::post('/latihan/home',[LatihanPaymentController::class, 'indexPost']);
Route::get('/latihan/test/lagi',[LatihanPaymentController::class, 'testAgain']);
Route::get('/latihan/api/ongkir',[LatihanPaymentController::class, 'testApi']);
Route::get('/latihan/nested',[LatihanPaymentController::class, 'testNest']);

// Admin
Route::get('/home/admin', [AdminLoginController::class, 'home'])->name('admin.homeAdmin')->middleware('auth:webadmin');
Route::get('/login/admin', [AdminLoginController::class, 'index'])->name('login-admin');
Route::post('/login-admin', [AdminLoginController::class, 'store'])->name('admin.loginAdmin');    
Route::get('/logout-admin', [AdminLoginController::class, 'logoutAdmin'])->name('admin.logOut')->middleware('auth:webadmin');

Route::resource('/verifikasi-user', VerifikasiController::class)->names([
    'index' => 'admin.verifikasi',
    'edit' => 'admin.verifikasi.edit'
])->middleware('auth:webadmin');

Route::resource('/verifikasi-penjual', VerifikasiPenjualController::class)->names([
    'index' => 'admin.verifikasi.penjual',
    'edit' => 'admin.verifikasi.penjual.edit',
    'show' => 'admin.verifikasi.penjual.show'
])->middleware('auth:webadmin');

Route::resource('/admin-category', CategoryController::class)->names([
    'index' => 'admin.category',
    'create' => 'admin.category.create',
    'edit' => 'admin.category.edit'
])->middleware('auth:webadmin');

Route::resource('/admin-kurir', KurirController::class)->names([
    'index' => 'admin.kurir',
    'create' => 'admin.kurir.create',
    'edit' => 'admin.kurir.edit'
])->middleware('auth:webadmin');


// User
Route::get('/home/user', [UserLoginController::class, 'home'])->name('user.Home')->middleware('auth');
Route::get('/home/user/about', [UserLoginController::class, 'aboutUser'])->middleware('auth');
Route::get('/login/user', [UserLoginController::class, 'index'])->name('login-user');
Route::post('/login-user', [UserLoginController::class, 'store'])->name('user.loginUser');    
Route::get('auth/google', [UserLoginController::class, 'redirectGoogle'])->name('user.googleLogin');    
Route::get('auth/google/call-back', [UserLoginController::class, 'callbackGoogle']);    
Route::get('/logout-user', [UserLoginController::class, 'logoutUser'])->name('logout-user');
Route::get('/register-user', [UserLoginController::class, 'homeRegister']);
Route::post('/register-user', [UserLoginController::class, 'prosesRegister'])->name('user.registerUser'); 
Route::get('/home/user/product/buku/{id}', [ProdukBukuController::class, 'getBuku'])->name('user.getProductBuku')->middleware('auth');
Route::get('/home/user/product/allBuku', [ProdukBukuController::class, 'productAll'])->name('user.getAllBuku')->middleware('auth');
Route::get('/home/user/product/allBuku/cate/{id}', [ProdukBukuController::class, 'showByCate'])->name('allBuku.cate')->middleware('auth');
Route::post('/home/user/product/allBuku/store', [ProdukBukuController::class, 'storeToKeranjang'])->name('store.keranjang')->middleware('auth');
Route::get('/home/user/keranjang', [KeranjangUserController::class, 'indexKeranjang'])->name('user.keranjangUser')->middleware('auth');
Route::delete('/home/user/keranjang/delete/{id}', [KeranjangUserController::class, 'deleteKeranjang'])->name('keranjangUser.delete')->middleware('auth');
Route::get('/home/user/keranjang/transaksi/{id}', [TransaksiController::class, 'transaksiUser'])->name('user.transaksiUser')->middleware('auth');
Route::get('/home/user/keranjang/prosesTransaksi', [TransaksiController::class, 'lanjut'])->name('user.transaksiUserLanjut')->middleware('auth');
Route::post('/home/user/keranjang/prosesTransaksi/store', [TransaksiController::class, 'storeTransaksi'])->name('user.transaksiUserProsesLanjut.store')->middleware('auth');
Route::get('/home/user/history/belanja', [TransaksiController::class, 'homeHistory'])->name('user.history')->middleware('auth');

// Penjual
Route::get('/home/penjual', [PenjualLoginController::class, 'homePenjual'])->name('penjual.indexPenjual')->middleware('auth:webpenjual');
Route::get('/login/penjual', [PenjualLoginController::class, 'loginPenjual'])->name('penjual.loginPenjual');
Route::get('/register/penjual', [PenjualLoginController::class, 'registerPenjual'])->name('penjual.registerPenjual');
Route::post('/proses/login/penjual', [PenjualLoginController::class, 'prosesLoginPenjual'])->name('penjual.prosesLoginPenjual');
Route::post('/proses/register/penjual', [PenjualLoginController::class, 'registerP'])->name('penjual.prosesRegisterPenjual');
Route::get('/proses/logout/penjual', [PenjualLoginController::class, 'logoutPenjual'])->name('penjual.prosesLogoutPenjual')->middleware('auth:webpenjual');
Route::get('/home/penjual/verifikasiPenjual', [NextRegisterPenjualController::class, 'createVerifikasi'])->name('penjual.verifikasiPenjual')->middleware('auth:webpenjual');
Route::post('/home/penjual/verifikasiPenjual/store', [NextRegisterPenjualController::class, 'storeVerifikasi'])->name('penjual.verifikasiPenjual.store')->middleware('auth:webpenjual');
Route::get('/home/penjual/edit/penjual/{id}', [EditProfileController::class, 'eProfilePenjual'])->name('penjual.eProfile')->middleware('auth:webpenjual');
Route::put('/home/penjual/edit/penjual/{id}', [EditProfileController::class, 'prosesProfilePenjual'])->name('penjual.proses.eProfile')->middleware('auth:webpenjual');
Route::get('/home/penjual/list/transaksi', [TransaksiController::class, 'viewTransaksiPenjual'])->name('penjual.list.t')->middleware('auth:webpenjual');
Route::post('/home/penjual/list/transaksi/store', [TransaksiController::class, 'sendToPesanan'])->name('penjual.list.t.store')->middleware('auth:webpenjual');
Route::get('/home/penjual/pesanan', [TransaksiController::class, 'homePesananPenjual'])->name('penjual.pesanan')->middleware('auth:webpenjual');

Route::resource('/penjual-crud-buku', CrudBukuController::class)->names([
    'index' => 'penjual.crud.buku',
    'create' => 'penjual.crud.buku.create',
    'edit' => 'penjual.crud.buku.edit'
])->middleware('auth:webpenjual');



