<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\BackendIndexController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// login Routes
//LoginPage===========--------------===========>>>>
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/admin', [LoginController::class, 'loginPost'])->name('login.post');
Route::get('admin/logout', [LoginController::class, 'logout'])->name('adminLogout');

Route::get('/dashboard', [BackendIndexController::class, 'index'])->name('dashboard')->middleware('auth');

// Super Admin
Route::group(['middleware' => ['auth', 'role:1'], 'as' => 'superadmin.'], function () {

    Route::get('/superadmin/index', [BackendIndexController::class, 'index'])->name('dashboard');

});


// Admin
Route::group(['middleware' => ['auth', 'role:2'], 'as' => 'admin.'], function () {

    Route::get('/admin/index', [BackendIndexController::class, 'index'])->name('dashboard');

});

// User
Route::group(['middleware' => ['auth', 'role:3'], 'as' => 'user.'], function () {

    Route::get('/user/index', [BackendIndexController::class, 'index'])->name('dashboard');

});
