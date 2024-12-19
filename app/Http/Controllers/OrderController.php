<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        // Validasi input
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'qty' => 'required|integer|min:1',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:500',
        ]);

        // Ambil data produk berdasarkan product_id
        $product = Product::findOrFail($request->product_id);

        // Hitung total harga
        $totalHarga = $product->price * $request->qty;

        // Simpan data pesanan ke database
        $order = Order::create([
            //'user_id' => auth()->id() ?? null, // Tambahkan user_id jika autentikasi ada
            'quantity' => $request->qty,
            'address' => $request->address,
            'phone' => $request->phone,
            'total_harga' => $totalHarga,
            'status' => "unpaid",
        ]);

        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        // Parameter transaksi Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => $order->id, // Gunakan ID order
                'gross_amount' => $totalHarga, // Total harga
            ],
            'customer_details' => [
                'first_name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ],
        ];

        // Dapatkan Snap Token Midtrans
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // Tampilkan halaman pembayaran
        return view('home.checkout', compact('snapToken', 'order'));
    }
}

