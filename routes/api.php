<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\BookingsController;
use App\Http\Controllers\Api\SportsCategoriesController;
use App\Http\Controllers\Api\SportsController;
use App\Http\Controllers\Api\VendorsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'namespace' => 'Api'], function () {

    // Authentication
    Route::get('/users/get-profile', [LoginController::class, 'getProfile']);
    Route::post('/users/register', [LoginController::class, 'register']);
    Route::post('/users/login', [LoginController::class, 'login']);
    Route::post('/users/login-otp', [LoginController::class, 'loginWithOtp']);

    Route::get('/cities', [LoginController::class, 'cities']);

    // Vendors
    Route::post('/vendors/validate', [VendorsController::class, 'validateVendor']);
    Route::post('/vendors', [VendorsController::class, 'store']);

    // Sports Categories
    Route::get('/sports-categories', [SportsCategoriesController::class, 'index']);

    // Sports
    Route::get('sports', [SportsController::class, 'index']);
    Route::post('sports', [SportsController::class, 'store']);
    Route::post('sports/{sport}', [SportsController::class, 'update']);
    Route::get('sports/{sport}', [SportsController::class, 'show']);


    // Bookings
    Route::get('bookings', [BookingsController::class, 'index']);
    Route::post('bookings', [BookingsController::class, 'store']);
});
