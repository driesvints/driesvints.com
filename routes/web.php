<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::redirect('/blog', '/')->name('blog');
Route::get('/blog/{post:slug}', PostController::class)->name('post');
