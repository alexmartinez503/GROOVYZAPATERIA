<?php

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Frontend\FrontController;
use Illuminate\Routing\RouteGroup;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\checkoutController;
use App\Http\Controllers\Frontend\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontController::class,'index']);
Route::get('category',[FrontController::class,'category']);
Route::get('view-category/{slug}',[FrontController::class,'viewCategory']);
Route::get('category/{cate_slug}/{prod_slug}',[FrontController::class,'productView']);


Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/add-to-cart',[CartController::class, 'addProduct']);
Route::post('delete-cart-item',[CartController::class,'deleteProduct']);
Route::post('update-cart',[CartController::class, 'updateCart']);


Route::middleware(['auth'])->group(function(){
    Route::get('cart', [CartController::class, 'viewCart']);
    Route::get('checkout', [checkoutController::class,'index']);
    Route::post('place-order', [checkoutController::class, 'placeOrder']);

    Route::get('my-orders',[UserController::class, 'index']);
    Route::get('view-order/{id}',[UserController::class, 'view']);

});



Route::middleware(['auth','isAdmin'])-> group(function () {
    //panel de administracion
    Route::get('/dashboard', [FrontendController::class, 'index']);
    //rutas de categorias
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('add-category', [CategoryController::class, 'add']);
    Route::post('insert-category', [CategoryController::class, 'insert']);
    Route::get('edit-category/{id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{id}',[CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);

    //rutas de productos
    Route::get('products',[ProductsController::class,'index']);
    Route::get('add-products',[ProductsController::class,'add']);
    Route::post('insert-product',[ProductsController::class, 'insert']);
    Route::get('edit-product/{id}',[ProductsController::class, 'edit']);
    Route::put('uptade-product/{id}',[ProductsController::class,'update']);
    Route::get('delete-product/{id}', [ProductsController::class, 'destroy']);

    Route::get('users', [FrontendController::class, 'users']);
    Route::get('orders', [OrderController::class, 'index']);
    Route::get('admin/view-order/{id}', [OrderController::class, 'view']);
    Route::put('update-order/{id}',[OrderController::class,'updateorder']);
    Route::get('order-history',[OrderController::class,'orderhistory']);
 
 });