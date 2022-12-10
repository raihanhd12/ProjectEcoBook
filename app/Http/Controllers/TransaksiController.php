<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\Pesanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function transaksiUser($id)
    {
        $gtKeranjang = Keranjang::findOrFail($id);

        return view('user.transaksi.home_transaksi', compact('gtKeranjang'));
    }

    public function lanjut(Request $request)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-m7KihEoPxTgwUf4ZGszBqix4';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $qty = $request->get('quantity_keranjang');
        $prc = $request->get('price_keranjang');
        $totalS = $qty * $prc;
        
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $totalS,
            ),
            'item_details' => array(
                [
                    'id' => rand(),
                    'price' => $prc,
                    'quantity' => $qty,
                    'name' => $request->get('nama_buku_keranjang')
                ],
            ),
            'customer_details' => array(
                'first_name' => $request->get('first_name_keranjang'),
                'last_name' => $request->get('last_name_keranjang'),
                'email' => $request->get('email_keranjang'),
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('user.transaksi.lanjut_transaksi', [
            'snap_token' => $snapToken
        ]);
    }
    public function storeTransaksi(Request $request)
    {
        // return $request;
        $json = json_decode($request->get('json_response'));
        $trans = new Transaksi();
        $trans->penjual_id = $request->get('penjual_id');
        $trans->status = $json->transaction_status;
        $trans->nama_buku_keranjang = $request->get('nama_buku_keranjang');
        $trans->quantity_keranjang = $request->get('quantity_keranjang');
        $trans->price_keranjang = $request->get('price_keranjang');
        $trans->first_name_keranjang = $request->get('first_name_keranjang');
        $trans->last_name_keranjang = $request->get('last_name_keranjang');
        $trans->email_keranjang = $request->get('email_keranjang');
        $trans->transaction_id = $json->transaction_id;
        $trans->order_id = $json->order_id;
        $trans->gross_amount = $json->gross_amount;
        $trans->payment_type = $json->payment_type;
        $trans->transaction_time = isset($json->transaction_time) ? $json->transaction_time : null;
        $trans->payment_code = isset($json->payment_code) ? $json->payment_code : null;
        $trans->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;
        $trans->save();
        if ($trans) {
            $data = DB::table('keranjangs')->where('id', $request->get('id_transaksi'))->update(['level' => 2]);
            return redirect()->route('user.Home')->with('success', 'Transaksi Berhasil Dilakukan');
        }
    }

    public function viewTransaksiPenjual()
    {
        $dataTransaksi = Transaksi::where('penjual_id', '=', auth()->guard('webpenjual')->user()->id)->where('level', '=', 1)->latest()->get();
        return view('penjual.transaksi.index_transaksi', [
            'dataPesanan' => $dataTransaksi
        ]);
    }

    public function sendToPesanan(Request $request)
    {
        $validasi = $request->validate([
            'penjual_id' => 'required',
            'transaksi_id' => 'required',
            'first_name_keranjang' => 'required',
            'status_pesanan' => 'required'
        ]);
        Pesanan::create($validasi);
        if ($validasi['status_pesanan'] === "Ditolak") {
            if ($validasi) {
                $data = DB::table('transaksis')->where('id', $request->transaksi_id)->update(['level' => 2]);
                return redirect()->route('penjual.pesanan')->with('success', 'Pesanan Berhasil Anda Tolak');
            }
        } elseif ($validasi['status_pesanan'] === "Diterima") {
            if ($validasi) {
                $data = DB::table('transaksis')->where('id', $request->transaksi_id)->update(['level' => 2]);
                return redirect()->route('penjual.pesanan')->with('success', 'Pesanan Berhasil Anda Terima');
            }
        }
    }

    public function homePesananPenjual()
    {
        $dataPesanan = Pesanan::where('penjual_id', '=', auth()->guard('webpenjual')->user()->id)->latest()->get();
        return view('penjual.transaksi.home_pesanan', [
            'dPesanan' => $dataPesanan
        ]);
    }

    public function homeHistory()
    {
        $dataP = Pesanan::where('first_name_keranjang', '=', auth()->user()->first_name)->latest()->get();
        return view('user.history.home_history', [
            'dataP' => $dataP
        ]);
    }
}
