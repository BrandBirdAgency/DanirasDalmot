<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Service;
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
        return view('team', compact('about'));
    }

    public function product()
    {
        return view('products');
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
