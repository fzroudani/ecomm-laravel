<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
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
Route::get('/login', function () {
    return view('login');
});
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});
Route::get('/admin/logout',function (){
    Session::forget('admin');
    return redirect('admin/login');
});
Route::view('/register','register');
Route::post('/login',[UserController::class,'login']);
Route::post('/register',[UserController::class,'register']);
Route::get('/',[ProductController::class,'index']);
Route::get('detail/{num}',[ProductController::class,'detail']);
Route::get('search',[ProductController::class,'search']);
Route::post('/add_to_cart',[ProductController::class,'addToCart']);
Route::get('/cartlist',[ProductController::class,'cartList']);
Route::get('/removecart/{id}',[ProductController::class,'removeCart']);
Route::get('/ordernow',[ProductController::class,'orderNow']);
Route::post('/orderplace',[ProductController::class,'orderPlace']);
Route::get('/myorders',[ProductController::class,'myOrders']);

Route::get('/admin/login', function () {
    return view('loginad');
});
Route::post('/admin/login',[AdminController::class,'login']);
Route::get('/admin',[ProductController::class,'adminHome']);
Route::get('/admin/cartlist',[ProductController::class,'adCartList']);
Route::get('/admin/orders',[ProductController::class,'adOrderList']);
Route::get('/admin/products',[ProductController::class,'adProductList']);
Route::get('/admin/adproducts',[ProductController::class,'adProducts']);
Route::post('/admin/adnewproducts',[ProductController::class,'adNewProducts']);
Route::get('/validercommande/{id}',[ProductController::class,'validateComm']);
Route::get('/removeproduct/{id}',[ProductController::class,'removeProduct']);

Route::get('/upload-file', [FileUpload::class, 'createForm']);

Route::post('/upload-file', [FileUpload::class, 'fileUpload'])->name('fileUpload');
