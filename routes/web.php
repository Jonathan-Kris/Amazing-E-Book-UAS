<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
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

//Home
Route::get('/index/{locale?}',[MainController::class, 'indexHome'])->middleware('RedirectIfNotUser');
Route::get('/success/{locale?}',[CartController::class, 'submitCart'])->middleware('RedirectIfNotUser');

// Login Logout
Route::get('/login/{locale?}',[AuthController::class, 'indexLogin']);
Route::post('/login/{locale?}',[AuthController::class, 'login']);
Route::get('/logout/{locale?}',[AuthController::class, 'logout'])->middleware('RedirectIfNotUser');

// Registration
Route::get('/register/{locale?}',[AuthController::class, 'indexRegister']);
Route::post('/register/{locale?}',[AuthController::class, 'register']);

// Profile
Route::get('/profilePage/{locale?}',[ProfileController::class,'indexProfile'])->middleware('RedirectIfNotUser');
Route::put('/updateProfile/{idaccount}/{locale?}',[ProfileController::class,'updateProfile'])->middleware('RedirectIfNotUser');

// Landing Page
Route::get('/{locale?}',[MainController::class, 'indexLanding']);

// Book Detail
Route::get('/bookDetail/{book}/{locale?}',[BookController::class,'bookDetail'])->middleware('RedirectIfNotUser');
Route::get('/rentBook/{idaccount}/{idebook}/{locale?}',[BookController::class,'rentBook'])->middleware('RedirectIfNotUser');

// Cart
Route::get('/showCart/{idaccount}/{locale?}',[CartController::class,'indexCart'])->middleware('RedirectIfNotUser');
Route::get('/cartDelete/{idaccount}/{idebook}/{locale?}',[CartController::class,'deleteCart'])->middleware('RedirectIfNotUser');
Route::get('/cartSubmit/{idaccount}/{locale?}',[CartController::class,'submitCart'])->middleware('RedirectIfNotUser');

// Account Maintenance
Route::get('/account/{locale?}',[AccountController::class,'indexAccount'])->middleware('RedirectIfNotAdmin');
Route::get('/userDetail/{idaccount}/{locale?}',[AccountController::class,'indexUserDetail'])->middleware('RedirectIfNotAdmin');
Route::get('/userDelete/{idaccount}/{locale?}',[AccountController::class,'userDelete'])->middleware('RedirectIfNotAdmin');
Route::post('/userUpdate/{idaccount}/{locale?}',[AccountController::class,'userUpdate'])->middleware('RedirectIfNotAdmin');

