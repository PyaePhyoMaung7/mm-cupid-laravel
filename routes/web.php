<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\City\CityController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Hobby\HobbyController;
use App\Http\Controllers\Setting\SettingController;
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

    Route::group(['prefix' => 'user/'], function () {
        Route::get('create', [UserController::class, 'create']);
        Route::post('store', [UserController::class, 'store'])->name('user.store');
        Route::get('index', [UserController::class, 'index']);
        Route::get('password/edit/{id}', [UserController::class, 'editPassword']);
        Route::post('password/update', [UserController::class, 'updatePassword'])->name('user.password.update');
        Route::get('info/edit/{id}', [UserController::class, 'editInfo']);
        Route::post('info/update', [UserController::class, 'updateInfo'])->name('user.info.update');
        Route::get('change/status/{id}/{status}', [UserController::class, 'changeStatus']);
        Route::get('delete/{id}', [UserController::class, 'delete']);
    });

    Route::group(['prefix' => 'hobby/'], function () {
        Route::get('create', [HobbyController::class, 'create']);
        Route::post('store', [HobbyController::class, 'store'])->name('hobby.store');
        Route::get('index', [HobbyController::class, 'index']);
        Route::get('edit/{id}', [HobbyController::class, 'edit']);
        Route::get('delete/{id}', [HobbyController::class, 'delete']);
        Route::post('update', [HobbyController::class, 'update'])->name('hobby.update');
    });

    Route::group(['prefix' => 'setting/'], function () {
        Route::post('store', [SettingController::class, 'store'])->name('setting.store');
        Route::get('index', [SettingController::class, 'index']);
        Route::post('update', [SettingController::class, 'update'])->name('setting.update');
    });

});
