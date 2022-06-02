<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('about', 'about')->name('about');

Route::view('about', 'about')->name('about');

Route::get('/post', [App\Http\Controllers\PostController::class, 'index'])->name('post');