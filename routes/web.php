<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnouncementController;

Route::view('/', 'welcome');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');

Route::view('about', 'about')->name('about');
Route::get('/announcement', [AnnouncementController::class, 'index'])->name('announcement');
Route::post('/announcement', [AnnouncementController::class, 'store']);