<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function (){
    Route::get('/',[IndexController::class ,'index'])->name('index');
    Route::resource('/roles',RoleController::class);
    Route::resource('/permissions',PermissionController::class);
    Route::get('/users',[UserController::class,'index'])->name('users.index');
    Route::get('/users/{user}/roles',[UserController::class,'showRoles'])->name('users.roles');
    Route::delete('/users/{user}',[UserController::class,'destroy'])->name('users.destroy');
    Route::put('/users/{user}/assign-role',[UserController::class,'assignRole'])->name('users.assignRole');
});

Route::middleware('auth')->group(function (){
    Route::resource('/post', PostController::class);
    Route::get('/my-posts',[PostController::class, 'userPosts'])->name('post.my-posts');
});

require __DIR__ . '/auth.php';
