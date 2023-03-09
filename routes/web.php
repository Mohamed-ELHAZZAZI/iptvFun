<?php

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


Route::get('/login', [UsersController::class, 'showLogin'])->middleware('guest')->name('login');
Route::get('/register', [UsersController::class, 'showRegister'])->middleware('guest')->name('register');
Route::post('/user/store', [UsersController::class, 'store'])->middleware('guest')->name('user.store');
Route::post('/user/login', [UsersController::class, 'authenticate'])->middleware('guest')->name('user.login');

Route::get('/profile', [UsersController::class, 'showProfile'])->middleware('auth')->name('profile');
Route::post('/logout', [UsersController::class, 'logout'])->middleware('auth')->name('logout');
Route::post('/user/update/info', [UsersController::class, 'updateInfo'])->middleware('auth')->name('user.update.info');
Route::post('/user/update/password', [UsersController::class, 'updatePass'])->middleware('auth')->name('user.update.pass');


Route::get('/checkout/{slug}', function ($slug) {
    return view('pages.checkout', ['slug' => $slug]);
});


Route::get('checkout/{slug}', [StripePaymentController::class, 'stripe'])->middleware('auth');
Route::post('checkout', [StripePaymentController::class, 'stripePost'])->middleware('auth')->name('checkout.post');
Route::get('/iptv/{token}', [IptvController::class, 'show'])->middleware('auth')->name('iptv.show');
