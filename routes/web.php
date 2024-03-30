<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\CheckAlreadyLogin;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JobController;

Route::middleware([CheckLogin::class])->group(function () {
    Route::get('/', [JobController::class, 'index'])->name('home');

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'index')->name('categories');
        Route::get('/categories/add', 'create')->name('categories.add');
        Route::post('/categories/add', 'store')->name('categories.store');
        Route::get('/categories/edit/{category}', 'edit')->name('categories.edit');
        Route::post('/categories/edit/{category}', 'update')->name('categories.update');
        Route::get('/categories/destroy/{category}', 'destroy')->name('categories.destroy');
    });

    Route::controller(JobController::class)->group(function () {
        Route::get('/jobs', 'index')->name('jobs');
        Route::get('/jobs/add', 'create')->name('jobs.add');
        Route::post('/jobs/add', 'store')->name('jobs.store');
        Route::get('/jobs/edit/{job}', 'edit')->name('jobs.edit');
        Route::post('/jobs/edit/{job}', 'update')->name('jobs.update');
        Route::get('/jobs/destroy/{job}', 'destroy')->name('jobs.destroy');
    });
});

Route::controller(UserController::class)->middleware([CheckAlreadyLogin::class])->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginProcess')->name('loginProcess');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerProcess')->name('registerProcess');
    Route::get('/logout', 'logout')->name('logout')->withoutMiddleware([CheckAlreadyLogin::class]);
});

