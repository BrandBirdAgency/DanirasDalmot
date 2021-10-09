<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Product;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('index', compact('about'));
    }

    public function about()
    {
        return view('about');
    }

    public function team()
    {
        $about = About::first();
        $teams = Team::all();
        return view('team', compact('about', 'teams'));
    }

    public function product($id = 1)
    {
        $products = Product::all();
        return view('products', compact('products', 'id'));
    }

    public function orderSuccess()
    {
        return view('ordersucess');
    }

    public function contact()
    {
        $about = About::first();
        return view('contact', compact('about'));
    }
}
