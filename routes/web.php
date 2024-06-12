<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\cellPhonesController;
use App\Http\Controllers\customersController;
use App\Http\Controllers\rentalsController;
use App\Http\Controllers\sellersController;
use App\Http\Controllers\WebController;

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

Route::get('/', [WebController::class, 'login']);
Route::get('/login', [WebController::class, 'login']);
Route::get('/home', [WebController::class, 'home']);


