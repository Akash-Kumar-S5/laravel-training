<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalaryController;
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
    return to_route('user.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/user', [EmployeeController::class,'index'])->name('user.index');
    Route::get('/user/create', [EmployeeController::class,'create'])->name('user.create');

    Route::get('/user/show/{employee}', [EmployeeController::class,'show'])->name('user.show');
    Route::get('/user/edit/{employee}', [EmployeeController::class,'edit'])->name('user.edit');
    Route::delete('/user/delete', [EmployeeController::class,'destroy'])->name('user.destroy');
    Route::post('/user/update', [EmployeeController::class,'update'])->name('user.update');
    Route::post('user/store',[EmployeeController::class, 'store'])->name('user.store');


    Route::get('/search', [EmployeeController::class, 'search'])->name('employee.search');

    Route::post('/salary/generate-pay/{salary}', [SalaryController::class, 'generatePay'])->name('salary.generate-pay');
    Route::get('/users/recharge', [SalaryController::class, 'employeesWithoutSalary'])->name('salary.not-assigned');
    Route::get('/recharge/new', [SalaryController::class, 'create'])->name('salary.create');
    Route::post('/recharge/done', [SalaryController::class, 'store'])->name('salary.store');
    Route::resource('/salary', SalaryController::class)->except(['create', 'store']);
});

Route::middleware(['auth', 'role:employee'])->group(function () {
    Route::get('employees/my-details/{employee}', [EmployeeController::class, 'show'])->name('employees.show');
    Route::get('/employees/payment-history', [SalaryController::class, 'paymentHistory'])->name('salary.payment-history');
});

require __DIR__ . '/auth.php';
