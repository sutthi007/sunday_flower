<?php

use App\Http\Controllers\cityController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\subController;
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
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route for dashboard
Route::resource('projects',userController::class);
Route::get('search',[userController::class,'search'])->name('search');
Route::get('date',[userController::class,'dateScan'])->name('date');
Route::get('projects-order',[userController::class,'order'])->name('projects-order');
Route::get('projects-transit',[userController::class,'transit'])->name('projects-transit');
Route::get('projects-success',[userController::class,'success'])->name('projects-success');

// Route for order
Route::resource('FormOrder',OrderController::class);
Route::post('save',[OrderController::class,'total'])->name('save');
Route::get('bill/summary/{id}',[OrderController::class,'sum'])->name('bill');
Route::get('/prnpriview/{id}',[OrderController::class,'prnpriview']);

//Route for Profile
Route::resource('Profile',ProfileController::class);
Route::post('Profile/update-password',[ProfileController::class,'update_password'])->name('update_password');

//Route for Employee
Route::resource('Employee',EmployeeController::class);
Route::get('customer/add',[EmployeeController::class,'add'])->name('customer/add');

//Route for service
Route::resource('service',ServiceController::class);
Route::get('/service/add/parcel',[ServiceController::class,'addlistP'])->name('parcel');
Route::get('/service/add/flower',[ServiceController::class,'addlistflower'])->name('flower');
Route::get('/service/add/animal',[ServiceController::class,'addlistanimal'])->name('animal');
Route::get('/service/add/motorcycle',[ServiceController::class,'addlistmotorcle'])->name('motorcycle');

//Route for transport
Route::resource('transport',ProvinceController::class);
Route::resource('subdistrict',subController::class);
Route::resource('city',cityController::class);
Route::get('province/fetch',[subController::class,'fetch'])->name('fetch');

Route::resource('customer-systems',CustomerController::class);

Route::resource('summary',SummaryController::class);
Route::get('summary-transport',[SummaryController::class,'transport'])->name('sumTransport');
Route::get('summary-account',[SummaryController::class,'account'])->name('sumAccount');

Route::get('/export-excel',[OrderController::class,'export'])->name('export');
Route::get('/export-pdf',[OrderController::class,'pdf']);
Route::get('/pdf',[OrderController::class,'downloadPDF']);

Route::get('test',[OrderController::class,'viewReport'])->name('report');

//summary 
Route::get('/account-details-day', function () {
    return view('summary/account-details-day');
});
Route::get('/transport-details-day',function (){
    return view('summary/transport-details-day');
});
Route::get('/account-details-month', function () {
    return view('summary/account-details-month');
});
Route::get('/transport-details-month',function (){
    return view('summary/transport-details-month');
});