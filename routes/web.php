<?php

use App\Http\Controllers\AuthController;
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
Route::get('/index/{locale?}',[MainController::class, 'indexHome']);
Route::get('/success/{locale?}',[MainController::class, 'successPage']);

Route::get('/login/{locale?}',[AuthController::class, 'indexLogin']);
Route::post('/login/{locale?}',[AuthController::class, 'login']);
Route::get('/logout/{locale?}',[AuthController::class, 'logout']);

Route::get('/register/{locale?}',[AuthController::class, 'indexRegister']);
Route::post('/register/{locale?}',[AuthController::class, 'register']);

Route::get('/profilePage/{locale?}',[ProfileController::class,'indexProfile']);
Route::put('/updateProfile/{idaccount}/{locale?}',[ProfileController::class,'updateProfile']);

Route::get('/{locale?}',[MainController::class, 'indexHome'] );
