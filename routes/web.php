<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IptvController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\StripePaymentController;

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






Route::get('/', [HomeController::class, 'index'])->name('home');


Route::name('user.')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/login', [UsersController::class, 'showLogin'])->name('login');
        Route::get('/register', [UsersController::class, 'showRegister'])->name('register');
        Route::post('/user/store', [UsersController::class, 'store'])->name('store');
        Route::post('/user/login', [UsersController::class, 'authenticate'])->name('auth.check');
    });


    Route::middleware(['auth'])->group(function () {

        Route::get('/profile', [UsersController::class, 'showProfile'])->name('profile');
        Route::post('/logout', [UsersController::class, 'logout'])->name('logout');
        Route::post('/user/update/info', [UsersController::class, 'updateInfo'])->name('update.info');
        Route::post('/user/update/password', [UsersController::class, 'updatePass'])->name('update.pass');


        Route::get('/checkout/{slug}', function ($slug) {
            return view('pages.checkout', ['slug' => $slug]);
        });


        Route::get('checkout/{slug}', [StripePaymentController::class, 'stripe']);
        Route::post('checkout', [StripePaymentController::class, 'stripePost'])->name('checkout.post');
        Route::get('/iptv/{token}', [IptvController::class, 'show'])->name('iptv.show');
    });
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin'])->group(function () {
        Route::view('/login', 'admin.login')->name('login');
        Route::post('/check', [AdminController::class, 'check'])->name('check');
    });

    // Route::middleware(['auth:admin'])->group(function () {
    //     Route::view('/home', 'admin.home')->name('home');
    // });
    Route::get('/{vue_capture?}', function () {
        return view('admin.home');
    })->where('vue_capture', '[\/\w\.-]*');
});
