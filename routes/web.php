<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\City\CityController;
use App\Http\Controllers\Dashboard\DashboardController;

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
    return redirect('admin-backend/index');
});

Route::get('/admin-backend/login', [AuthController::class, 'adminLoginForm']);
Route::post('/admin-backend/login', [AuthController::class, 'postAdminLogin'])->name('admin.login');
Route::get('/admin-backend/logout', [AuthController::class, 'adminLogout']);

Route::group(['prefix' => '/admin-backend/', 'middleware' => 'admin'], function () {
    Route::get('index', [DashboardController::class, 'index']);

    Route::group(['prefix' => 'city/'], function () {
        Route::get('create', [CityController::class, 'create']);
        Route::post('store', [CityController::class, 'store'])->name('city.store');
        Route::get('index', [CityController::class, 'index']);
        Route::get('edit/{id}', [CityController::class, 'edit']);
        Route::post('update', [CityController::class, 'update'])->name('city.update');
    });
});
