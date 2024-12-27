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
        return view('customer.home',compact('product','count'));
        
    }


    public function checkout(){
        $product = Product::first();
        return view('customer.checkout', compact('product'));
    }


}