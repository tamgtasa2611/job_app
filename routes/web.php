<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\CheckAlreadyLogin;
use App\Http\Controllers\UserController;

Route::middleware([CheckLogin::class])->group(function () {
    Route::get('/', function () {
        return view('jobs.index');
    })->name('home');

    Route::get('/login', function () {
        return view('users.login');
    });
});

Route::controller(UserController::class)->middleware([CheckAlreadyLogin::class])->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginProcess')->name('loginProcess');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerProcess')->name('registerProcess');
    Route::get('/logout', 'logout')->name('logout')->withoutMiddleware([CheckAlreadyLogin::class]);
});

