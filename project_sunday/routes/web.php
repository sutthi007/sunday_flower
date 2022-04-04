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
    return view('serve/serve');
});
Route::get('/serve-increase-1', function(){
    return view('serve/increase/serve-increase-1');
});
Route::get('/serve-increase-2', function(){
    return view('serve/increase/serve-increase-2');
});
Route::get('/serve-increase-3', function(){
    return view('serve/increase/serve-increase-3');
});
Route::get('/serve-increase',function(){
    return view('serve/increase/serve-increase');
});
Route::get('/serve-editor-1', function(){
    return view('serve/editor/serve-editor-1');
});
Route::get('/serve-editor-2', function(){
    return view('serve/editor/serve-editor-2');
});
Route::get('/serve-editor-3', function(){
    return view('serve/editor/serve-editor-3');
});
Route::get('/serve-editor',function(){
    return view('serve/editor/serve-editor');
});
Route::get('/customer', function(){
    return view('customer');
});
Route::get('/summarize', function(){
    return view('summarize');
});
Route::get('/account', function(){
    return view('account');
});
Route::get('/transport', function(){
    return view('transport');
});
Route::get('/employee-2',function(){
    return view('employee/employee');
});
Route::get('/employee-profile',function(){
    return view('employee/employee-profile');
});
Route::get('/employee-profile-editor',function(){
    return view('employee/employee-profile-editor');
});
Route::get('/login',function(){
    return view('login');
});