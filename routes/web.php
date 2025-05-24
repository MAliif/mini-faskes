<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardCtrl;
use App\Http\Controllers\RegistrasiCtrl;
use App\Http\Controllers\RoleCtrl;
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

Route::get('/', function () {
    return auth()->check() ? redirect('/dashboard') : redirect()->route('login');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login-post', 'login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register-post', 'register');
});

Route::prefix('role')->controller(RoleCtrl::class)->group(function () {
    Route::get('/get-role', 'getRole');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('dashboard')->controller(DashboardCtrl::class)->group(function () {
        Route::get('/', 'index')->name('dashboard');
        Route::get('/profile', 'profile');
    });

    Route::prefix('registrasi')->controller(RegistrasiCtrl::class)->group(function () {
        Route::get('/pasien-baru', 'pasienBaru');
        Route::get('/pasien-lama', 'pasienLama');
        Route::post('/save-pasien', 'savePasien');
        Route::post('/regis-pasien', 'regisPasien');
    });
});
