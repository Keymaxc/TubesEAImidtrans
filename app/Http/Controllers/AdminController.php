<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    // Halaman tambah produk
    public function add_Product()
    {
        return view('admin.addProduct');
    }

    // Proses upload produk
    public function upload_product(Request $request)
    {
        $data = new Product;
        $data->title = $request->title;
        $data->desc = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->qty;

        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $data->image = $imagename;
        }
        $data->save();

        return redirect()->back()->with('success', 'Product added successfully.');
    }

    // Halaman daftar produk
    public function index()
    {
        $products = Product::all();
        return view('admin.viewProduct', compact('products'));
    }

    // Halaman edit produk
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.edit', compact('product'));
    }

    // Proses update produk
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->title = $request->title;
        $product->desc = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->qty;

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if (file_exists(public_path('products/' . $product->image))) {
                unlink(public_path('products/' . $product->image));
            }
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('products', $imagename);
            $product->image = $imagename;
        }

        $product->save();
        return redirect()->route('admin.viewProduct')->with('success', 'Product updated successfully.');
    }

    // Menghapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        // Hapus gambar produk jika ada
        if (file_exists(public_path('products/' . $product->image))) {
            unlink(public_path('products/' . $product->image));
        }
        $product->delete();
        return redirect()->route('admin.viewProduct')->with('success', 'Product deleted successfully.');
    }
}
