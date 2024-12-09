<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/roles', [RoleController::class, 'index']);
Route::get('/role/create', [RoleController::class, 'create']);
Route::post('/role/store', [RoleController::class, 'store'])->name('role.store');
Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
Route::post('/role', [RoleController::class, 'update'])->name('role.update');

Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [UserController::class, 'create_user'])->name('user.store');

Route::prefix('/x')->middleware(['can:user list'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
});
