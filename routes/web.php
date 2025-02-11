<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\authController;
use App\Http\Controllers\articleController;
use App\Http\Controllers\userController;
use App\Http\Controllers\categoryController;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/home', [homeController::class, 'index'])->name('home');
Route::post('/signin', [authController::class, 'login'])->name('signin');
Route::post('/signup', [authController::class, 'register'])->name('signup');
Route::get('manageusers', [UserController::class, 'index'])->name('manageuser')->middleware('checkadmin');

// ARTICLE
Route::group(['prefix' => 'article', 'as' => 'article.'], function () {
    Route::get('show/{post}', [articleController::class, 'show'])->name('show');
    Route::get('create', [articleController::class, 'create'])->name('create');
    Route::get('manage', [articleController::class, 'manage'])->name('manage');
    Route::post('store', [articleController::class, 'store'])->name('store');
    Route::delete('delete/{post}', [articleController::class, 'destroy'])->name('delete');
    Route::post('edit/{post}', [articleController::class, 'edit'])->name('edit');
    Route::post('update/{post}', [articleController::class, 'update'])->name('update');
});

// CATEGORY
Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
    Route::get('create', [categoryController::class, 'create'])->name('create');
    Route::post('store', [categoryController::class, 'store'])->name('store');
});

