<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\SellerController;
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

Route::get('/', [ClientController::class, 'signup']);
Route::get('/cliente/login', [ClientController::class, 'login']);
Route::get('/home', [ClientController::class, 'home']);

Route::post('/cliente/novo', [ClientController::class, 'store']);

Route::get('/vendedor/cadastrar', [SellerController::class, 'signup']);
Route::get('/vendedor/entrar', [SellerController::class, 'login']);
Route::get('/dashboard', [SellerController::class, 'dashboard']);

Route::post('/vendedor/novo', [SellerController::class, 'store']);