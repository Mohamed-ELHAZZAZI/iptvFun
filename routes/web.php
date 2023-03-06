<?php

use App\Http\Controllers\UsersController;
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

Route::get('/', function () {
    return view('pages.Home');
});


Route::get('/login', [UsersController::class, 'showLogin'])->middleware('guest')->name('login');
Route::get('/register', [UsersController::class, 'showRegister'])->middleware('guest')->name('register');
Route::post('/storeUser', [UsersController::class, 'store'])->middleware('guest')->name('storeUser');
Route::post('/loginUser', [UsersController::class, 'authenticate'])->middleware('guest')->name('loginUser');

Route::get('/profile', [UsersController::class, 'showProfile'])->middleware('auth')->name('profile');
Route::post('/logout', [UsersController::class, 'logout'])->middleware('auth')->name('logout');
Route::post('/updateUser', [UsersController::class, 'updateInfo'])->middleware('auth')->name('updateInfo');
Route::post('/updatePass', [UsersController::class, 'updatePass'])->middleware('auth')->name('updatePass');
