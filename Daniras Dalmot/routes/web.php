<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Home Page
Route::view('/index', 'index')->name('homepage');

//About page
Route::view('/about', 'about')->name('aboutpage');

//Team page
Route::view('/team', 'team')->name('teampage');

//Product Page
Route::prefix('products')->group(
    function () {
        Route::view('/', 'product')->name('productpage');
    }
);


//Contact Page
Route::prefix('/contact')->group(
    function (){
        Route::view('/', 'contact')->name('contactpage');
    }
);

// Authentication
Route::view('/adminlogin', 'auth.login');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

