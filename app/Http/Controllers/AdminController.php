<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class AdminController extends Controller
{
    public function add_Product()
    {
        return view('admin.addProduct');
    }

    public function upload_product(Request $request){

    
        $data = new Product;
        $data-> title = $request->title;
        $data-> desc = $request->description;
        $data-> price = $request->price;
        $data-> quantity = $request->qty;

        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }
        $data->save();

        //toastr()->timeout(10000)->closeButton()->addSuccess('Add Product Success');
        return redirect()->back();
        
    }
}
