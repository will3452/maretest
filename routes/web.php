<?php

use App\Http\Controllers\InterestController;
use Illuminate\Support\Facades\Route;

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
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'store']);
Route::get('/interest', [InterestController::class, 'index'])->name('interest.index');
Route::post('/interest', [InterestController::class, 'store']);