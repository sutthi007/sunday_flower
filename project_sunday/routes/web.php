<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SummaryController;



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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('projects',userController::class);
Route::get('search',[userController::class,'search'])->name('search');

Route::resource('FormOrder',OrderController::class);
Route::post('save',[OrderController::class,'total'])->name('save');
Route::get('bill/summary/{id}',[OrderController::class,'sum'])->name('bill');

Route::resource('Profile',ProfileController::class);

Route::resource('Employee',EmployeeController::class);

Route::resource('service',ServiceController::class);

Route::resource('customer-systems',CustomerController::class);

Route::resource('summary',SummaryController::class);

Route::get('Account',function(){
    return view('summary.account');
});
Route::get('transport',function(){
    return view('summary.transport');
});
Route::get('customer/add',function(){
    return view('Employee.employee-add');
});
