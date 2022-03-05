<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EBookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SignupController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/index/{locale?}', [HomeController::class, 'index']);

Route::get('/home/{locale?}', [EBookController::class, 'index']);
Route::get('/ebook/detail/{id}/{locale?}', [EBookController::class, 'show']);

Route::get('/profile/{locale?}', [AccountController::class, 'index']);
Route::put('/profile/update/{id}/{locale?}', [AccountController::class, 'update']);

Route::get('/cart/{locale?}', [CartController::class, 'index']);
Route::post('/cart/rent', [CartController::class, 'insertToCart']);
Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart']);

Route::post('/checkout/{locale?}', [OrderController::class, 'checkout']);
Route::get('/history/{locale?}', [OrderController::class, 'history']);

Route::get('/account-maintenance/{locale?}', [AccountController::class, 'accountMaintenance']);
Route::get('/account-maintenance/update/{id}/{locale?}', [AccountController::class, 'updateAccountMaintenance']);
Route::put('/account-maintenance/update/{id}', [AccountController::class, 'updateAccountRole']);
Route::put('/account-maintenance/delete/{id}', [AccountController::class, 'softDeleteAccount']);

Route::get('/login/{locale?}', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/signup/{locale?}', [SignupController::class, 'index']);
Route::post('/signup', [SignupController::class, 'signup']);


Route::get('/logout/{locale?}', [LoginController::class, 'logout']);


