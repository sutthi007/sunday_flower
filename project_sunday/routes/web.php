<?php

use App\Http\Controllers\cityController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\expensesController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\ProvincesToController;
use App\Http\Controllers\subController;
use App\Http\Controllers\CustomerAddController;
use App\Http\Controllers\SummaryController;
use App\Models\Order;
use App\Models\user;
use Illuminate\Http\Request;

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
Route::resource('projects',userController::class)->middleware(['auth']);
Route::get('search',[userController::class,'search'])->name('search')->middleware(['auth']);
Route::get('date',[userController::class,'dateScan'])->name('date')->middleware(['auth']);
Route::get('projects-order',[userController::class,'order'])->name('projects-order')->middleware(['auth']);
Route::get('projects-transit',[userController::class,'transit'])->name('projects-transit')->middleware(['auth']);
Route::get('projects-success',[userController::class,'success'])->name('projects-success')->middleware(['auth']);

// Route for order
Route::resource('FormOrder',OrderController::class)->middleware(['auth']);
Route::get('editor/{id}',[OrderController::class,'editOrder'])->name('editOrder')->middleware(['auth']);
Route::put('update/{id}',[OrderController::class,'updateOrder'])->name('updateOrder')->middleware(['auth']);
Route::post('save',[OrderController::class,'total'])->name('save')->middleware(['auth']);
Route::get('getmoney/summary/{id}',[OrderController::class,'sum'])->name('getmoney')->middleware(['auth']);
Route::post('save/money',[OrderController::class,'getmoney'])->name('savemoney')->middleware(['auth']);
Route::get('bill/summary/{id}',[OrderController::class,'bill'])->name('bill')->middleware(['auth']);
Route::get('/prnpriview/{id}',[OrderController::class,'prnpriview'])->middleware(['auth']);

//Route for Profile
Route::resource('Profile',ProfileController::class);
Route::post('Profile/update-password',[ProfileController::class,'update_password'])->name('update_password')->middleware(['auth']);

//Route for Employee
Route::resource('Employee',EmployeeController::class)->middleware(['auth']);
Route::get('customer/add',[EmployeeController::class,'add'])->name('customer/add')->middleware(['auth']);

//Route for service
Route::resource('service',ServiceController::class)->middleware(['auth']);
Route::get('/service/add/parcel',[ServiceController::class,'addlistP'])->name('parcel')->middleware(['auth']);
Route::get('/service/add/flower',[ServiceController::class,'addlistflower'])->name('flower')->middleware(['auth']);
Route::get('/service/add/animal',[ServiceController::class,'addlistanimal'])->name('animal')->middleware(['auth']);
Route::get('/service/add/motorcycle',[ServiceController::class,'addlistmotorcle'])->name('motorcycle')->middleware(['auth']);

//Route for transport
Route::resource('transport',ProvinceController::class)->middleware(['auth']);
Route::resource('provinceTo',ProvincesToController::class)->middleware(['auth']);
Route::resource('subdistrict',subController::class)->middleware(['auth']);
Route::resource('city',cityController::class)->middleware(['auth']);
Route::get('province/fetch',[subController::class,'fetch'])->middleware(['auth'])->name('fetch');

//customer
Route::resource('customer',CustomerAddController::class)->middleware(['auth']);
Route::resource('customer-systems',CustomerController::class)->middleware(['auth']);

Route::resource('summary',SummaryController::class)->middleware(['auth']);
Route::get('summary-transport',[SummaryController::class,'transport'])->name('sumTransport')->middleware(['auth']);
Route::get('summary-account',[SummaryController::class,'account'])->name('sumAccount')->middleware(['auth']);

Route::get('/export-excel',[OrderController::class,'export'])->name('export')->middleware(['auth']);
Route::get('test',[OrderController::class,'viewReport'])->name('report')->middleware(['auth']);

//summary
Route::get('/account-details-day/{date}', function ($date) {
    $account = Order::select('province_id')

                        ->whereDate('created_at',$date)

                        ->groupBy('province_id')->get();

    return view('summary/account-details-day',compact('account','date'));
})->middleware(['auth']);
Route::get('/account-details-day-pdf/{date}',[SummaryController::class,'viewSum'])->name('sum')->middleware(['auth']);
Route::get('/account-details-month-pdf/{date}/{year}',[SummaryController::class,'viewSumMonth'])->name('sumMonth')->middleware(['auth']);
Route::get('/report-month/{month}/{year}',[SummaryController::class,'viewreportMonth'])->name('reportMonth')->middleware(['auth']);

Route::get('/transport-details-day/{date}', function ($date){
    $transport = Order::select('province_id')
                        ->whereDate('created_at',$date)
                        ->groupBy('province_id')->get();
    $employee = user::all()->where('role','employee');
    $transports = Order::whereDate('created_at',$date)->get();

    return view('summary/transport-details-day',compact('transport','date','transports','employee'));
})->name('transport-em-up')->middleware(['auth']);

Route::get('/transport-details-day/{date}/{province}',[OrderController::class,'downloadPDF'])->middleware(['auth']);
Route::get('/transpot/add-emplpyee/{provonce}/{date}',[ProvinceController::class,'editTransportEmployee'])->middleware(['auth']);
Route::post('/transpot/add-update-emplpyee/{id}/{date}',[ProvinceController::class,'updateTransportEmployee'])->middleware(['auth'])->name('emp-update');

Route::get('/account-details-month', function () {
    return view('summary/account-details-month');
})->middleware(['auth']);
Route::get('/transport-details-month',function (){
    return view('summary/transport-details-month');
})->middleware(['auth']);

Route::resource('expenses',expensesController::class)->middleware(['auth']);
Route::get('/expenses-editor', function (){
    return view('summary/expenses-editor');
})->middleware(['auth']);
Route::get('/tracking',function (){
    return view('tranking');
});
Route::get('/tracking-search',function (Request $request){
    $tracking = Order::all()->where('tracking',$request->tracking);
    return view('tracking-search',compact('tracking'));
});
Route::post('forgot-password',[userController::class,'forgot_password'])->name('forgot');
