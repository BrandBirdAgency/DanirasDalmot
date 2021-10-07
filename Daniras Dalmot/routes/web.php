<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PublicController;
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
Route::get('/', [PublicController::class, 'index'])->name('homepage');

//About page
Route::get('/about', [PublicController::class, 'about'])->name('aboutpage');

//Team page
Route::get('/team', [PublicController::class, 'team'])->name('teampage');

//Product Page
Route::prefix('products')->group(
    function () {
        Route::get('/', [PublicController::class, 'product'])->name('productpage');
        Route::post('/order', [MailController::class, 'productmail'])->name('productorder');
    }
);

//Order Success
Route::get('/ordersuccess', [PublicController::class, 'orderSuccess'])->name('ordersucess');

//Contact Page
Route::prefix('/contact')->group(
    function () {
        Route::get('/', [PublicController::class, 'contact'])->name('contactpage');
        Route::post('/contactadmin', [MailController::class, 'contactmail'])->name('contactadmin');
    }
);


// Admin
Route::view('/admin', 'auth.login');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::view('/product-add', 'admin.add-product')->name('addproduct');

    // Company Info
    Route::post('/companyInfoEdit', [AdminController::class, 'companyInfoEdit'])->name('companyInfoEdit');
});

require __DIR__ . '/auth.php';
