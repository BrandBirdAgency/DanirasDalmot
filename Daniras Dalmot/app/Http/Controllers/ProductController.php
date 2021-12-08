<?php

namespace App\Http\Controllers;

use Picqer;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }
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
    public function store(ProductRequest $req)
    {
        $product = new Product();

        $latest = Product::orderBy('created_at', 'desc')->max('id');
        if ($latest == NULL) {
            $product->id = 10000;
            $latest = $latest;
        } else
            $latest = $latest + 1;

        $product->name = $req->name;
        $product->photo = $req->file('photo')->storeAs('public/images/products', $this->filterName($req->name) . '.jpg');
        $product->description = $req->description;
        $product->retail_price = $req->retail_price;
        $product->discount = $req->discount;
        $product->price = $req->price;
        $product->category = $req->category;
        $product->brand_name = $req->brand_name;
        $product->size = $req->size;

        //For QR CODE
        if ($req->hasFile('qr')) {

            $imageName = 'Qr_Product_' . $latest . '.' . $req->file('qr')->extension();
            $req->file('qr')->storeAs('public/images/qrcode', $imageName);
            $product->qr_path = '/storage/images/qrcode/' . $imageName;
        } else {
            $image = \QrCode::format('svg')
                ->size(200)->errorCorrection('H')
                ->generate("www.danirasdalmoth.com/product/$latest");
            $output_file = 'QrCode_Product_' . $latest . '.svg';
            Storage::put('public/images/qrcode/' . $output_file, $image);

            $product->qr_code = $image;
            $product->qr_path = '/storage/images/qrcode/' . $output_file;
        }


        $barnumber = '067244' . $latest . '1';

        if ($req->hasFile('bar')) {
            $imageName = 'Bar_Product_' . $latest . '.' . $req->file('bar')->extension();
            $req->file('bar')->storeAs('public/images/barcode', $imageName);
            $product->bar_path = '/storage/images/barcode/' . $imageName;
            $product->bar_number = $req->b_num;
        } else {
            $generator = new Picqer\Barcode\BarcodeGeneratorSVG();
            $barcode = $generator->getBarcode($barnumber, $generator::TYPE_CODE_128);
            $output_file = 'Bar_Product_' . $latest . '.svg';
            Storage::put('public/images/barcode/' . $output_file, $barcode);
            $product->bar_path = '/storage/images/barcode/' . $output_file;
            $product->bar_code = $barcode;
            $product->bar_number = $barnumber;
        }
        $product->save();
        return redirect()->route('product.index')->with('success', 'Product Inserted !!!');
    }

    public function qrDownload($id)
    {
        $p = Product::find($id);
        $file = Str::substr($p->qr_path, 22, Str::length($p->qr_path));
        return Storage::download('/public/images/qrcode/' . $file);
    }
    public function brDownload($id)
    {
        $p = Product::find($id);

        $file = Str::substr($p->bar_path, 23, Str::length($p->bar_path));
        return Storage::download('/public/images/barcode/' . $file);
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.productdetails', compact('product'));
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
    public function update(ProductRequest $req, $id)
    {
        $product = Product::find($id);
        $product->name = $req->name;
        if ($req->photo != null) {
            Storage::delete($product->photo);
            $product->photo = $req->file('photo')->storeAs('public/images/products', $this->filterName($req->name) . '.jpg');
        }
        $product->description = $req->description;
        $product->retail_price = $req->retail_price;
        $product->discount = $req->discount;
        $product->price = $req->price;
        $product->category = $req->category;
        $product->brand_name = $req->brand_name;
        $product->size = $req->size;
        $product->save();
        return redirect()->route('product.show', $id)->with('success', 'Product Updated!!');
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


    public function stockUpdate(Request $req)
    {
        if ($req->ajax()) {
            $data = $req->all();
            if ($data['display'] == 1) {
                $data['display'] = 0;
            } else {
                $data['display'] = 1;
            }
            Product::where('id', $data['productId'])->update(['in_stock' => $data['display']]);
        }
    }

    public function homeUpdate(Request $req)
    {
        if ($req->ajax()) {
            $data = $req->all();
            if ($data['display'] == 1) {
                $data['display'] = 0;
            } else {
                $data['display'] = 1;
            }
            Product::where('id', $data['productId'])->update(['home' => $data['display']]);
        }
    }
    private function filterName($name)
    {
        $name = preg_replace('/[^A-Za-z0-9\- ]/', '', $name);
        $name = str_replace(' ', '-', strtolower(trim($name)));
        return $name;
    }
}
