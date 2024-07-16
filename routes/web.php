<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\City\CityController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Hobby\HobbyController;
use App\Http\Controllers\Mail\MailController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\Setting\SettingController;
use App\Http\Controllers\User\UserController;

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
    return redirect('index');
});

Route::get('/admin-backend/login', [AuthController::class, 'adminLoginForm']);
Route::post('/admin-backend/login', [AuthController::class, 'postAdminLogin'])->name('admin.login');
Route::get('/admin-backend/logout', [AuthController::class, 'adminLogout']);
Route::get('/register', [MemberController::class, 'register']);
Route::post('/api/register', [MemberController::class, 'postRegister'])->name('register');
Route::get('/login', [MemberController::class, 'login']);
Route::post('/login', [MemberController::class, 'postMemberLogin']);
Route::get('/logout', [MemberController::class, 'logout']);
Route::get('api/cities', [MemberController::class, 'apiGetCities']);
Route::get('api/hobbies', [MemberController::class, 'apiGetHobbies']);
Route::post('api/check-email', [MemberController::class, 'apiCheckEmail']);
Route::get('/email-confirm', [MemberController::class, 'confirmEmail']);
Route::get('forgot-password', [MemberController::class, 'forgotPassword']);
Route::post('password-reset-email', [MemberController::class, 'sendPasswordResetLink']);
Route::get('password-reset-code-check', [MemberController::class, 'passwordResetCodeCheck']);
Route::get('password-reset', [MemberController::class, 'resetPassword']);
Route::post('password-reset', [MemberController::class, 'postResetPassword']);

Route::get('/send-mail', [MailController::class, 'index']);

Route::group(['prefix' => '/', 'middleware' => 'member'], function () {
    Route::get('index', [MemberController::class, 'index']);
    Route::group(['prefix' => 'api'], function () {
        Route::post('/sync-members', [MemberController::class, 'apiSyncMembers']);
        Route::post('/member/view/update', [MemberController::class, 'apiMemberViewUpdate']);
        Route::post('/invite', [MemberController::class, 'apiSendDateRequest']);
        Route::get('/member', [MemberController::class, 'apiGetLoginInfo']);
        Route::post('/member/update', [MemberController::class, 'apiMemberUpdate']);
    });
    Route::get('profile', [MemberController::class, 'getProfile']);
});
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
        Route::get('index', [SettingController::class, 'index']);
        Route::get('edit', [SettingController::class, 'edit']);
        Route::post('update', [SettingController::class, 'update'])->name('setting.update');
    });

    Route::group(['prefix' => 'member/'], function () {
        Route::get('index', [MemberController::class, 'adminIndex']);
        // Route::get('point/{id}', [MemberController::class, 'point']);
        Route::get('change/status', [MemberController::class, 'changeStatus']);
        // Route::get('delete/{id}', [UserController::class, 'delete']);
    });

});
