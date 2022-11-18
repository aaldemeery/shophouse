<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StoreController;

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

Route::group(['middleware' => 'auth'], function () {
    //Logout
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    //Stores
    Route::resource('stores', StoreController::class);
});


Route::group(['middleware' => 'guest'], function () {
    //Register & Login
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('signup', [AuthController::class, 'signup'])->name('singup');
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('signin', [AuthController::class, 'signin'])->name('signin');
});


