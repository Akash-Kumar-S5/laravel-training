<?php

use App\Http\Controllers\postController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// routes/web.php
//Route::get('/')

Route::get('/', function () {
    return view('welcome');
})->name('index');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Custom URLs using except and only methods
Route::resource('home', PostController::class)->except('show'); // Exclude show and destroy actions

// Manually defining routes with custom URLs
//Route::get('home', [PostController::class, 'index'])->name('post.index');
Route::get('home/create', [PostController::class, 'create'])->name('post.create');
Route::post('home', [PostController::class, 'store'])->middleware('post-validator')->name('post.store');
Route::get('home/my-posts', [PostController::class, 'show'])->name('post.show');
Route::get('home/{post:post_name}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::post('home/edit/{id}', [PostController::class, 'update'])->middleware('post-validator')->name('post.update');

