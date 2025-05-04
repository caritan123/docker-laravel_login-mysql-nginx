<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('auth.login');
    return view('welcome');
});

Auth::routes([
    'register' => false,
    'verified' => true
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
