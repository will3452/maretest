<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');

Route::view('about', 'about')->name('about');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'store']);