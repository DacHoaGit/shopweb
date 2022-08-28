<?php

use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\Users\LoginController;
// use App\Http\Controllers\Admin\Users\MainController;
use App\Http\Controllers\admin\users\MenuController;
use App\Http\Controllers\MainController as ControllersMainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MenuController as ControllersMenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController as ControllersProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Laravel\Socialite\Facades\Socialite;
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
Route::get('/logout', [LoginController::class,'logout']);
Route::middleware(['admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [HomeController::class,'index'])->name('admin');
        Route::post('/filter-day', [HomeController::class,'filterDay'])->name('filterDay');
        // Route::post('main/filter-product', [HomeController::class,'filterProduct']);

        Route::prefix('menus')->group(function () {
            Route::get('add',[MenuController::class,'create']);
            Route::post('add',[MenuController::class,'store']);
            Route::get('list',[MenuController::class,'index']);
            Route::post('api',[MenuController::class,'showMenu'])->name('api-show-menu');
            Route::get('listApi',[MenuController::class,'list'])->name('listApi');
            Route::get('edit/{menu}',[MenuController::class,'show']);
            Route::post('edit/{menu}',[MenuController::class,'update']);
            Route::DELETE('destroy',[MenuController::class,'destroy']);
        });

        Route::prefix('products')->group(function () {
            Route::get('add',[ProductController::class,'create']);
            Route::post('add',[ProductController::class,'store']);
            Route::get('list',[ProductController::class,'index']);
            Route::post('api',[ProductController::class,'showProduct'])->name('api-show-product');
            Route::get('edit/{product}',[ProductController::class,'show']);
            Route::post('edit/{product}',[ProductController::class,'update']);
            Route::DELETE('destroy',[ProductController::class,'destroy']);
        });

        Route::prefix('sliders')->group(function () {
            Route::get('add',[SliderController::class,'create']);
            Route::post('add',[SliderController::class,'store']);
            Route::get('list',[SliderController::class,'index']);
            Route::post('api',[SliderController::class,'showSlider'])->name('api-show-slider');
            Route::get('edit/{slider}',[SliderController::class,'show']);
            Route::post('edit/{slider}',[SliderController::class,'update']);
            Route::DELETE('destroy',[SliderController::class,'destroy']);
        });

        Route::prefix('customer')->group(function () {
            Route::get('',[CartController::class,'index']);
            Route::post('api',[CartController::class,'showCustomer'])->name('api-show-customer');
            Route::get('/detail/{customer}',[CartController::class,'detail']);
            Route::get('/export-{customer}',[CartController::class,'export'])->name('bill-export');
            Route::post('update/',[CartController::class,'update']);
        });

        Route::prefix('payments')->group(function () {
            Route::get('add',[PaymentController::class,'create']);
            Route::post('add',[PaymentController::class,'store']);
            Route::get('list',[PaymentController::class,'index']);
            Route::post('api',[PaymentController::class,'showPayment'])->name('api-show-payment');
            Route::get('edit/{payment}',[PaymentController::class,'show']);
            Route::post('edit/{payment}',[PaymentController::class,'update']);
            Route::DELETE('destroy',[PaymentController::class,'destroy']);
        });
        

        Route::post('upload',[UploadController::class,'store'])->name('upload');
    });
    
});

Route::get('/', [MainController::class,'index'])->name('home');
Route::get('/search', [MainController::class,'searchProducts']);
Route::post('/services/load-product', [MainController::class,'loadProduct']);
Route::get('/danh-muc/{id}-{slug}.html', [ControllersMenuController::class,'index']);
Route::get('/san-pham/{id}-{slug}.html', [ControllersProductController::class,'index']);


Route::middleware(['auth'])->group(function(){
    Route::get('/carts', [CartController::class,'show']);
    Route::post('/update-carts', [CartController::class,'update']);
    Route::DELETE('carts/delete',[CartController::class,'delete']);
    Route::post('/carts', [CartController::class,'index']);
    Route::post('/payment', [CartController::class,'addCard']);

    Route::get('/profile', [ProfileController::class,'index']);
    Route::post('/profile', [ProfileController::class,'changeName']);
    Route::post('/profile', [ProfileController::class,'changePassWord']);

    Route::get('/my-order', [OrderController::class,'index']);
    Route::get('/payment/{customer}', [OrderController::class,'payment']);
    Route::post('/payment/update', [OrderController::class,'updatePayment']);

});



Route::get('/test', [TestController::class,'test']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// The Email Verification Notice
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// The Email Verification Handler
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Resending The Verification Email
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');




Route::prefix('facebook')->group(function(){
    Route::get('/login', [LoginController::class,'loginWithGoogle'])->name('login-facebook');
    Route::get('/callback', [LoginController::class,'callBackFromGoogle']);
});
