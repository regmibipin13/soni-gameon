<?php

use App\Http\Controllers\BookingsController;
use App\Http\Controllers\FilepondController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SportsCategoryController;
use App\Http\Controllers\SportsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VendorsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->to('/home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {

    Route::view('about', 'about')->name('about');

    Route::resource('permissions', PermissionsController::class);
    Route::resource('roles', RolesController::class);

    Route::post('users/status/{user}', [UsersController::class, 'status'])->name('users.status');
    Route::post('users/reset/{user}', [UsersController::class, 'reset'])->name('users.reset');


    Route::resource('users', UsersController::class);


    Route::resource('vendors', VendorsController::class);
    Route::resource('sports-categories', SportsCategoryController::class);
    Route::resource('sports', SportsController::class);
    Route::resource('bookings', BookingsController::class);



    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
