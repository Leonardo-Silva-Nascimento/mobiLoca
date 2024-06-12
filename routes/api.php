<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\cellPhonesController;
use App\Http\Controllers\customersController;
use App\Http\Controllers\rentalsController;
use App\Http\Controllers\sellersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'login']);

Route::middleware(['auth:api'])->group(function () {

    Route::group(['prefix' => '/customers'], function () {
        Route::get('/all', [customersController::class, 'getAllCustomers']);
        Route::get('/create', [customersController::class, 'createCustomers']);
        Route::get('/get/{id}', [customersController::class, 'showById']);
        Route::post('/update', [customersController::class, 'update']);
        Route::delete('/delete', [customersController::class, 'delete']);
    });

    Route::group(['prefix' => '/Rentals'], function () {
        Route::get('/all', [rentalsController::class, 'getAllRentals']);
        Route::get('/create', [rentalsController::class, 'createRentals']);
        Route::get('/get/{id}', [rentalsController::class, 'showById']);
        Route::post('/update', [rentalsController::class, 'update']);
        Route::delete('/delete', [rentalsController::class, 'delete']);
    });

    Route::group(['prefix' => '/Sellers'], function () {
        Route::get('/all', [sellersController::class, 'getAllSellers']);
        Route::get('/create', [sellersController::class, 'createSellers']);
        Route::get('/get/{id}', [sellersController::class, 'showById']);
        Route::post('/update', [sellersController::class, 'update']);
        Route::delete('/delete', [sellersController::class, 'delete']);
    });

    Route::group(['prefix' => '/CellPhones'], function () {
        Route::get('/all', [cellPhonesController::class, 'getAllCellPhones']);
        Route::get('/create', [cellPhonesController::class, 'createCellPhones']);
        Route::get('/get/{id}', [cellPhonesController::class, 'showById']);
        Route::post('/update', [cellPhonesController::class, 'update']);
        Route::delete('/delete', [cellPhonesController::class, 'delete']);
    });
});