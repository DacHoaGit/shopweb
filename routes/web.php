<?php

use App\Http\Controllers\Admin\CartController as AdminCartController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\Users\LoginController;
// use App\Http\Controllers\Admin\Users\MainController;
use App\Http\Controllers\admin\users\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MainController as ControllersMainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MenuController as ControllersMenuController;
use App\Http\Controllers\ProductController as ControllersProductController;
use App\Http\Controllers\TestController;

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('admin/users/login', [LoginController::class,'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class,'store']);
Route::get('admin/logout', [LoginController::class,'logout']);
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('main', [HomeController::class,'index'])->name('admin');
        Route::get('/', [HomeController::class,'index'])->name('admin');

        Route::prefix('menus')->group(function () {
            Route::get('add',[MenuController::class,'create']);
            Route::post('add',[MenuController::class,'store']);
            Route::get('list',[MenuController::class,'index']);
            Route::get('listApi',[MenuController::class,'list'])->name('listApi');
            Route::get('edit/{menu}',[MenuController::class,'show']);
            Route::post('edit/{menu}',[MenuController::class,'update']);
            Route::DELETE('destroy',[MenuController::class,'destroy']);
        });

        Route::prefix('products')->group(function () {
            Route::get('add',[ProductController::class,'create']);
            Route::post('add',[ProductController::class,'store']);
            Route::get('list',[ProductController::class,'index']);
            Route::get('edit/{product}',[ProductController::class,'show']);
            Route::post('edit/{product}',[ProductController::class,'update']);
            Route::DELETE('destroy',[ProductController::class,'destroy']);
        });

        Route::prefix('sliders')->group(function () {
            Route::get('add',[SliderController::class,'create']);
            Route::post('add',[SliderController::class,'store']);
            Route::get('list',[SliderController::class,'index']);
            Route::get('edit/{slider}',[SliderController::class,'show']);
            Route::post('edit/{slider}',[SliderController::class,'update']);
            Route::DELETE('destroy',[SliderController::class,'destroy']);
        });
        Route::get('customer',[AdminCartController::class,'index']);
        Route::get('customer/detail/{customer}',[AdminCartController::class,'detail']);
        Route::post('customer/update/',[AdminCartController::class,'update']);

        Route::post('upload',[UploadController::class,'store'])->name('upload');
    });
    
});

Route::get('/', [MainController::class,'index'])->name('home');
Route::post('/services/load-product', [MainController::class,'loadProduct']);
Route::get('/danh-muc/{id}-{slug}.html', [ControllersMenuController::class,'index']);
Route::get('/san-pham/{id}-{slug}.html', [ControllersProductController::class,'index']);
Route::get('/carts', [CartController::class,'show']);
Route::post('/update-carts', [CartController::class,'update']);
Route::DELETE('carts/delete',[CartController::class,'delete']);
Route::post('/carts', [CartController::class,'index']);
Route::post('/payment', [CartController::class,'addCard']);





Route::get('/test', [TestController::class,'index']);

