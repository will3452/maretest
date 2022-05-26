<?php

use App\Http\Controllers\InterestController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');

Route::view('about', 'about')->name('about');

Route::get('/interest', [InterestController::class, 'index'])->name('interest.index');
Route::post('/interest', [InterestController::class, 'store']);
