<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }

    public function team()
    {
        return view('team');
    }

    public function product()
    {
        return view('product');
    }

    public function orderSuccess()
    {
        return view('ordersucess');
    }

    public function contact()
    {
        return view('contact');
    }
}
