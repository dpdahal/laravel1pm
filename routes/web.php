<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ApplicationController;
use App\Http\Controllers\Backend\DashboardController;


Route::group(['namespace' => 'Frontend'], function () {
    Route::any('/', [ApplicationController::class, 'index'])->name('index');
    Route::any('/about', [ApplicationController::class, 'about'])->name('about');
    Route::any('/contact', [ApplicationController::class, 'contact'])->name('contact');

});


Route::group(['namespace' => 'Backend', 'prefix' => 'company-backend'], function () {
    Route::any('/', [DashboardController::class, 'index'])->name('dashboard');

});
