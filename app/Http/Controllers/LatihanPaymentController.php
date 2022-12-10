<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class LatihanPaymentController extends Controller
{
    public function indexForm(Request $request)
    {
        return view('latihan_form');
    }

    public function index(Request $request)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-m7KihEoPxTgwUf4ZGszBqix4';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $amount1 = $request->get('price');
        $amount2 = $request->get('quantity_anda');
        $amount3 = $amount1 * $amount2;
        
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $amount3,
            ),
            'item_details' => array(
                [
                    'id' => rand(),
                    'price' => $request->get('harga_anda'),
                    'quantity' => $request->get('quantity_anda'),
                    'name' => $request->get('nama_makanan')
                ],
            ),
            'customer_details' => array(
                'first_name' => $request->get('uname'),
                'last_name' => $request->get('uname'),
                'email' => $request->get('email'),
                'phone' => $request->get('number'),
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('latihan', [
            'snap_token' => $snapToken
        ]);
    }

    public function indexPost(Request $request)
    {
        // return $request;
        $json = json_decode($request->get('json_response'));
        $order = new Order();
        $order->status = $json->transaction_status;
        $order->uname = $request->get('uname');
        $order->email = $request->get('email');
        $order->number = $request->get('number');
        $order->harga_anda = $request->get('harga_anda');
        $order->quantity_anda = $request->get('quantity_anda');
        $order->nama_makanan = $request->get('nama_makanan');
        $order->transaction_id = $json->transaction_id;
        $order->order_id = $json->order_id;
        $order->gross_amount = $json->gross_amount;
        $order->payment_type = $json->payment_type;
        $order->payment_code = isset($json->payment_code) ? $json->payment_code : null;
        $order->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;
        return $order->save() ? redirect(url('/latihan/form'))->with('alert-success', 'Order berhasil dibuat') : redirect(url('/latihan/form'))->with('alert-failed', 'Terjadi kesalahan');
    }

    public function testAgain()
    {
        $cate = Category::all();
        return view('test_lagi', [
            'dataC' => $cate
        ]);
    }

    public function testApi()
    {
        $data = Http::withHeaders([
            'key' => 'f12ab7d57c7f50ac0b4dbee09ae2825c'
        ])->get("https://api.rajaongkir.com/starter/city");
        return $data;
    }

    public function testNest()
    {   
        $test4 = DB::select('SELECT categories.nama_category,
        COUNT(bukus.id_category) AS `hasil_cate`
        FROM bukus
        RIGHT OUTER JOIN categories ON bukus.id_category = categories.id
        WHERE bukus.id_penjual = 1
        GROUP BY categories.nama_category
        ORDER BY bukus.id_category');
        // $test3 = DB::table('bukus')->selectRaw('categories.nama_category ')->selectRaw('count(bukus.id_category)')->rightJoin('categories', 'bukus.id_category', '=', 'categories.id')->where('bukus.id_penjual', '=', 2)->groupByRaw('categories.nama_category')->orderByRaw('bukus.id_category');
        // $test2 = DB::select('SELECT categories.nama_category, COUNT(bukus.id_category) RIGHT JOIN categories ON bukus.id_category = categories.id WHERE bukus.id_penjual = 1 GROUP BY categories.nama_category ORDER BY bukus.id_category');
        // $test = DB::table('categories')->rightJoin('bukus', 'categories.id', '=', 'bukus.id_category')->get();
        $db = Buku::with('category')->where('id_penjual', '=', 2)->get();
        // dd($test4);
        return view('latihan.another', ['db' => $db, 'test4' => $test4]);
    }

}
