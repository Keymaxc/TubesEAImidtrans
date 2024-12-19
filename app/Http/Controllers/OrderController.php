<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Midtrans\snap;
use Midtrans\config;


class OrderController extends Controller
{
    public function checkoutform (Order $order){
        return view('home.checkout' ,compact ('order'));
    }
    public function checkout(Request $request)
    {
        $request->request->add(['total_price'=> $request->qty * 12000,'status'=>'Unpaid']);



        // Ambil data produk berdasarkan product_id
        // $product = Product::findOrFail($request->product_id);
        $products = Product::all();
        // // Hitung total harga
        // $totalHarga = $product->price * $request->qty;

        // Simpan data pesanan ke database
        
        $order = Order::create($request->all());

        // Konfigurasi Midtrans

        Config::$serverKey = config('midtrans.serverKey');
        Config::$clientKey = config('midtrans.clientKey');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Parameter transaksi Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => $order->id, // Gunakan ID order
                'gross_amount' => $order->total_price, // Total harga
            ],
            'customer_details' => [
                'first_name' => $order->name,
                'email' => $order->email,
                'phone' => $order->phone,
                'address' => $order->address,
            ],
        ];

        // Dapatkan Snap Token Midtrans
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // Tampilkan halaman pembayaran
        return view('home.checkout', compact('snapToken', 'order'));
    }

    
}

