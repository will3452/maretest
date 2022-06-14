<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\AnnouncementController;

Route::view('/', 'welcome');

Auth::routes(['verify' => true]);
Route::get('/logout', function () {
    auth()->logout();
    return redirect()->to('/');
})->middleware(['auth']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');

Route::view('about', 'about')->name('about');

Route::get('/post', [App\Http\Controllers\PostController::class, 'index'])->name('post');
Route::post('/post', [PostController::class, 'store']);
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'store']);
Route::get('/interest', [InterestController::class, 'index'])->name('interest.index');
Route::post('/interest', [InterestController::class, 'store']);
Route::get('/announcement', [AnnouncementController::class, 'index'])->name('announcement');
Route::post('/announcement', [AnnouncementController::class, 'store']);
