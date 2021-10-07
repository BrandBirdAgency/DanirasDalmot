<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.

     */
    public function create()
    {
        return view('addProduct');
    }

    /**
     * Store a newly created resource in storage.

     */
    public function store(Request $req)
    {
        $req->validate(
            [
                'name' => 'string|required',
                'description' => 'text | required',
                'photo' => 'mimes:jpeg,jpg,png,gif|max:1024|required',
                'in_stock' => 'required',
                'retail_price' => 'number|required',
                'discount' => 'number|required',
                'price' => 'number|required',
                'category' => 'required',
                'brand_name'=>'text|required',
                'size'=>'text|required'
            ]
            );
        $product = new Product();
        $product -> name = $req -> name;
        $image = $req -> file('image');
        $product->image = $image -> storeAs('public/images/products',$req->name);
        $product-> description = $req-> description;
        $product -> in_stock = $req -> in_stock;
        $product -> retail_price = $req -> retail_price;
        $product -> discount = $req -> discount;
        $product -> price = $req -> price;
        $product -> category = $req -> category;
        $product -> brand_name = $req -> brand_name;
        $product -> size = $req -> size;
        $product -> save();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('admin.dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin.editProduct');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, $id)
    {
        $req->validate(
            [
                'name' => 'string|required',
                'description' => 'text | required',
                'photo' => 'mimes:jpeg,jpg,png,gif|max:1024|required',
                'in_stock' => 'required',
                'retail_price' => 'number|required',
                'discount' => 'number|required',
                'price' => 'number|required',
                'category' => 'required',
                'brand_name'=>'text|required',
                'size'=>'text|required'
            ]
            );
        $product = Product::find($id);
        $product -> name = $req -> name;
        $image = $req -> file('image');
        $product->image = $image -> storeAs('public/images/products',$req->name);
        $product-> description = $req-> description;
        $product -> in_stock = $req -> in_stock;
        $product -> retail_price = $req -> retail_price;
        $product -> discount = $req -> discount;
        $product -> price = $req -> price;
        $product -> category = $req -> category;
        $product -> brand_name = $req -> brand_name;
        $product -> size = $req -> size;
        $product -> save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        Storage::delete($product->image);
        $product->delete();
    }
}
