<?php

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
Route::get('/index', function(){
    return view('index');
});
Route::get('/order', function(){
    return view('order');
});
Route::get('/order-step-1', function(){
    return view('order-step-1');
});
Route::get('/profile', function(){
    return view('profile');
});
Route::get('/profile-editor', function(){
    return view('profile-editor');
});
Route::get('/employee', function(){
    return view('employee-information');
});
Route::get('/employee-data', function(){
    return view('employee-data');
});
Route::get('/employee-editor', function(){
    return view('employee-editor');
});
Route::get('/employee-add', function(){
    return view('employee-add');
});
Route::get('/serve', function(){
    return view('serve');
});
Route::get('/serve-editor', function(){
    return view('serve-editor');
});