<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\User;

use App\Models\Cart;
use App\Models\order;
use App\Models\order_items;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(){
        $product = product::all();

        $user=Auth::user();

        $userid = $user->id;

        $count = Cart::where('user_id',$userid)->count();
        return view('home.index',compact('product','count'));
        
    }

    public function add_cart($id){

        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;

        $data = new Cart;
        $data->user_id = $user_id;
        $data->product_id = $product_id;

        $data->save();

        return redirect()->back();

    }

    public function cart()
    {
        // Ambil cart items untuk pengguna yang sedang login
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();
        
        // Hitung total harga
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->product->price;
        });

        return view('home.cart', compact('cartItems', 'totalPrice'));
    }

    public function removeFromCart($id)
    {
        // Hapus item dari cart berdasarkan id
        $cartItem = Cart::find($id);
        $cartItem->delete();

        return redirect()->route('cart')->with('success', 'Item removed from cart');
    }





}
