<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CouponContoller;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\LanguageController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


/*------------------------------------------

--------------------------------------------

All Normal Users Routes List

--------------------------------------------

--------------------------------------------*/


 Route::get('/home', [HomeController::class, 'index'])->name('home');





/*------------------------------------------

--------------------------------------------

All Admin Routes List

--------------------------------------------

--------------------------------------------*/
Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('auth');

Route::resource('category', CategoryController::class);
Route::resource('brand',BrandController::class);
Route::resource('product',ProductController::class);
Route::resource('coupon',CouponContoller::class);
Route::any('admin/product/sku-combination',[ProductController::class,'sku_combination'])->name('sku.combination');
Route::get('combination',[ProductController::class,'combination']);


Route::delete('image/{img_id}/delete',[ImageController::class,'Imagedestroy'])->name('destroyimage');




route::get('/',[FrontendController::class,'index'])->name('frontend');
route::get('cart',[FrontendController::class,'cart'])->name('cart');

Route::get('add-to-cart/{id}', [FrontendController::class, 'addToCart']);

Route::post('addcoupon', [FrontendController::class,'applyCoupon'])->name('addcoupon');
Route::get('checkout', [FrontendController::class,'checkout'])->name('checkout');

Route::post('update-cart', [FrontendController::class,'update']);
Route::post('remove-from-cart', [FrontendController::class, 'remove']);

//currency
Route::resource('currency',CurrencyController::class);


Route::post('currency-system-update', [CurrencyController::class,'currency_update'])->name('currency-system-update');
Route::get('currency-search', [CurrencyController::class,'searchCurrency'])->name('search');




//Language
Route::get('change-language/{lang}',[HomeController::class,'changeLang']);
//Route::get('language',[LanguageController::class,'index'])->middleware('Language');


//POS System

Route::resource('pos',PosController::class);

Route::get('quick-view',[PosController::class,'quick_view'])->name('quick-view');
Route::post('quick-view/variant-price',[PosController::class,'variant_price'])->name('pos.variant_price');
Route::post('pos/add-to-cart',[PosController::class,'addToCart'])->name('pos.add-to-cart');
Route::get('cart_id_get',[PosController::class,'get_cart_id'])->name('get_cart_id');
Route::get('new_cart_id',[PosController::class,'new_cart_id'])->name('new_cart_id');
Route::post('remove-from-cart',[PosController::class,'removeFromCart'])->name('remove-from-cart');
Route::post('update-from-cart',[PosController::class,'UpdateQuantity'])->name('update-from-cart');
Route::get('change-cart',[PosController::class,'change_cart'])->name('change-cart');
Route::get('clear-cart-id',[PosController::class,'clear_cart_id'])->name('clear-cart-id');
Route::post('remove-discount',[PosController::class,'remove_discount'])->name('remove-discount');
Route::post('add-new-customer',[PosController::class,'addCustomer'])->name('new_customer');
Route::get('customers',[PosController::class,'get_customers'])->name('customers');
Route::get('search-products',[PosController::class,'search_products'])->name('search-products');
Route::post('cart-save',[PosController::class,'saveCart'])->name('cart.add');



