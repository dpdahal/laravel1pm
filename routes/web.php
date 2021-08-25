<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ApplicationController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserLoginController;


Route::group(['namespace' => 'Frontend'], function () {
    Route::any('/', [ApplicationController::class, 'index'])->name('index');
    Route::any('/about', [ApplicationController::class, 'about'])->name('about');
    Route::any('/contact', [ApplicationController::class, 'contact'])->name('contact');

});

Route::group(['namespace' => 'Backend'], function () {
    Route::get('/login', [UserLoginController::class, 'index'])->name('login');
    Route::post('/login', [UserLoginController::class, 'login']);

});


Route::group(['namespace' => 'Backend', 'prefix' => 'company-backend', 'middleware' => 'auth'], function () {
    Route::any('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::any('logout', [UserLoginController::class, 'logout'])->name('logout');

});
