<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DakController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\BackendIndexController;
use App\Http\Controllers\User\UserController;
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
Route::group(['middleware' => ['auth', 'role:1'], 'as' => 'admin.'], function () {

    Route::get('/admin/index', [BackendIndexController::class, 'index'])->name('dashboard');

    Route::get('/admin/profile', [BackendIndexController::class, 'profile'])->name('profile');
    Route::patch('/admin/profile/{id}', [BackendIndexController::class, 'profileUpdate'])->name('profile.update');

    //Doctor
    Route::get('/admin/user', [AdminController::class, 'index'])->name('user.index');
    Route::get('/admin/user/create', [AdminController::class, 'create'])->name('user.create');
    Route::post('/admin/user', [AdminController::class, 'store'])->name('user.store');
    Route::get('/admin/user/{id}/edit', [AdminController::class, 'edit'])->name('user.edit');
    Route::patch('/admin/user/{id}', [AdminController::class, 'update'])->name('user.update');
    Route::get('/admin/user/delete/{id}', [AdminController::class, 'delete'])->name('user.delete');

    Route::get('/admin/daks', [DakController::class, 'index'])->name('daks');
    Route::get('/admin/daks/create', [DakController::class, 'create'])->name('daks.create');
    Route::post('/admin/daks/store', [DakController::class, 'store'])->name('daks.store');
    Route::get('/admin/daks/{dak}/edit', [DakController::class, 'edit'])->name('daks.edit');
    Route::patch('/admin/daks/{dak}', [DakController::class, 'update'])->name('daks.update');
    Route::get('/admin/daks/delete/{dak}', [DakController::class, 'destroy']);
    Route::post('/admin/daks/{id}/restore', [DakController::class, 'restore'])->name('daks.restore');
    Route::get('/admin/daks/{id}/download', [DakController::class, 'downloadDocuments'])->name('daks.download');

    Route::patch('admin/daks/{dak}/update-user', [DakController::class, 'updateUser'])->name('daks.updateUser');
    Route::patch('admin/daks/{dak}/update-status', [DakController::class, 'updateStatus'])->name('daks.updateStatus');
    Route::patch('admin/daks/{dak}/update-remark', [DakController::class, 'updateRemark'])->name('daks.updateRemark');

});


// Admin
// Route::group(['middleware' => ['auth', 'role:2'], 'as' => 'admin.'], function () {

//     Route::get('/admin/index', [BackendIndexController::class, 'index'])->name('dashboard');

// });

// User
Route::group(['middleware' => ['auth', 'role:2'], 'as' => 'user.'], function () {

    Route::get('/user/index', [BackendIndexController::class, 'index'])->name('dashboard');

    Route::get('/user/daks', [UserController::class, 'index'])->name('daks');
    Route::get('/user/daks/create', [UserController::class, 'create'])->name('daks.create');
    Route::post('/user/daks/store', [UserController::class, 'store'])->name('daks.store');
    Route::get('/user/daks/{dak}/edit', [UserController::class, 'edit'])->name('daks.edit');
    Route::patch('/user/daks/{dak}', [UserController::class, 'update'])->name('daks.update');
    Route::get('/user/daks/delete/{dak}', [UserController::class, 'destroy']);
    Route::post('/user/daks/{id}/restore', [UserController::class, 'restore'])->name('daks.restore');
    Route::get('/user/daks/{id}/download', [UserController::class, 'downloadDocuments'])->name('daks.download');

    Route::patch('user/daks/{dak}/update-user', [UserController::class, 'updateUser'])->name('daks.updateUser');
    Route::patch('user/daks/{dak}/update-status', [UserController::class, 'updateStatus'])->name('daks.updateStatus');
    Route::patch('user/daks/{dak}/update-remark', [UserController::class, 'updateRemark'])->name('daks.updateRemark');

});
