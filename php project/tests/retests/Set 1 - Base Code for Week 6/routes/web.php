<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('role', RoleController::class);
    Route::get('/roles', [RoleController::class, 'getAssign'])->name('roles.getAssign');
    Route::post('/roles/assign', [RoleController::class, 'assign'])->name('roles.assign');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', UserController::class)->middleware(['permission:User profile Read and Write', 'can:User profile Read']);

    // Apply 'can:Blog Read' middleware to the 'index' action
    Route::resource('blog', BlogController::class)->only('index')->middleware('can:Blog Read');

    // Apply 'can:Blog Read and Write' middleware to all other actions
    // Route::resource('blog', BlogController::class)->middleware('can:Blog Read and Write');

});


