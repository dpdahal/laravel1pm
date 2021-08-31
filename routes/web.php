<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ApplicationController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserLoginController;
use App\Http\Controllers\Backend\UserController;


Route::group(['namespace' => 'Frontend'], function () {
    Route::any('/', [ApplicationController::class, 'index'])->name('index');
    Route::any('/about', [ApplicationController::class, 'about'])->name('about');
    Route::any('/contact', [ApplicationController::class, 'contact'])->name('contact');

});

Route::group(['namespace' => 'Backend'], function () {
    Route::get('/login', [UserLoginController::class, 'index'])->name('login');
    Route::post('/login', [UserLoginController::class, 'login']);
    Route::any('password-reset', [UserLoginController::class, 'passwordReset'])->name('password-reset');
    Route::any('password-reset-link', [UserLoginController::class, 'passwordResetLink'])->name('password-reset-link');

});


Route::group(['namespace' => 'Backend', 'prefix' => 'company-backend', 'middleware' => 'auth'], function () {
    Route::any('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'users'], function () {
        Route::any('/', [UserController::class, 'index'])->name('users');
        Route::any('/create-user', [UserController::class, 'insert'])->name('create-user');
        Route::any('/delete-user/{criteria?}', [UserController::class, 'delete'])->name('delete-user');
        Route::any('/edit-user/{criteria?}', [UserController::class, 'edit'])->name('edit-user');
        Route::any('/edit-user-action', [UserController::class, 'editAction'])->name('edit-user-action');
        Route::any('/update-user-status', [UserController::class, 'updateUserStatus'])->name('update-user-status');

    });
    Route::any('logout', [UserLoginController::class, 'logout'])->name('logout');

});
