<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
    // return view('welcome');
});

Auth::routes([
    'register' => true,
    'verify' => true
]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('/task', TaskController::class)->names('task')->except('destroy');

});
