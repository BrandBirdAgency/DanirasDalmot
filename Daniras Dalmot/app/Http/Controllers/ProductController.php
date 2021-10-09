<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Picqer;

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
        return view('admin.addProduct');
    }

    /**
     * Store a newly created resource in storage.

     */
    public function store(Request $req)
    {


        $req->validate(
            [
                'name' => 'string|required',
                'description' => 'string|required',
                'photo' => 'required|max:5120',
                'retail_price' => 'required',
                'discount' => 'required',
                'price' => 'required',
                'brand_name' => 'string|required',
                'size' => 'required'
            ]
        );
        $product = new Product();
        $product->name = $req->name;
        $product->photo = $req->file('photo')->storeAs('public/images/products', $req->name);
        $product->description = $req->description;
        $product->in_stock = $req->in_stock;
        $product->retail_price = $req->retail_price;
        $product->discount = $req->discount;
        $product->price = $req->price;
        $product->category = $req->category;
        $product->brand_name = $req->brand_name;
        $product->size = $req->size;
        $image = \QrCode::format('svg')
            ->size(200)->errorCorrection('H')
            ->generate('www.test.com');
        $output_file = 'qrcodes/Product_' . $req->code . '.svg';
        Storage::disk('local')->put($output_file, $image);

        $product->qr_code=$image;
        $product->qr_path=$output_file;
        // dd($product);
        // $product->save();
        $redColor = [255, 0, 0];
        $number='26724401'.$req->code;
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        $product->bar_code= $generator->getBarcode('$number', $generator::TYPE_CODE_128);
        $product->bar_number=$number;

        $product->save();

        return redirect()->route('product.index');
    }

    public function qrDownload($id)
    {
        $p=Product::find($id);
        return Storage::download( $p->qr_path);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.productdetails',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.editProduct', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, $id)
    {
        $req->validate(
            [
                'name' => 'string|required',
                'description' => 'string|required',
                'photo' => 'max:5120',
                'retail_price' => 'required',
                'discount' => 'required',
                'price' => 'required',
                'brand_name' => 'string|required',
                'size' => 'required'
            ]
        );

        $product = Product::find($id);
        $product->name = $req->name;
        if ($req->photo != null) {
            Storage::delete($product->photo);
            $product->photo = $req->file('photo')->storeAs('public/images/products', $req->name);
        }
        $product->description = $req->description;
        $product->in_stock = $req->in_stock;
        $product->retail_price = $req->retail_price;
        $product->discount = $req->discount;
        $product->price = $req->price;
        $product->category = $req->category;
        $product->brand_name = $req->brand_name;
        $product->size = $req->size;
        $product->save();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        Storage::delete($product->photo);
        $product->delete();
        return redirect()->route('product.index');
    }
}
