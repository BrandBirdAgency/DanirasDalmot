<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
Route::get('/', [PublicController::class, 'index'])->name('homepage');

//About page
Route::get('/about', [PublicController::class, 'about'])->name('aboutpage');

//Team page
Route::get('/team', [PublicController::class, 'team'])->name('teampage');

//Product Page
Route::prefix('products')->group(
    function () {
        Route::get('/', [PublicController::class, 'product'])->name('productpage');
        Route::post('/order', [MailController::class, 'productMail'])->name('productorder');
    }
);

//Order Success
Route::get('/ordersuccess', [PublicController::class, 'orderSuccess'])->name('ordersucess');

//Contact Page
Route::prefix('/contact')->group(
    function () {
        Route::get('/', [PublicController::class, 'contact'])->name('contactpage');
        Route::post('/contactadmin', [MailController::class, 'contactMail'])->name('contactadmin');
    }
);


// Admin
Route::prefix('admin')->group(function () {
    Route::view('/login', 'auth.login')->name('adminLogin');
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    //Products
    Route::get('/product-index', [AdminController::class, 'product'])->name('product.index');
    Route::view('/shubhadon','admin.productdetails');
    Route::get('/product-add', [AdminController::class, 'productAdd'])->name('addproduct');
    Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product-edit{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('product-update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('product-delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
    Route::get('/qr-download/{id}', [ProductController::class, 'qrDownload'])->name('qrcode.download');


        // Company Info
        Route::post('/companyInfoEdit', [AdminController::class, 'companyInfoEdit'])->name('companyInfoEdit');

        // Message CEO/Chairman
        Route::post('/msg', [AdminController::class, 'msg'])->name('msg');
    });
});

require __DIR__ . '/auth.php';
