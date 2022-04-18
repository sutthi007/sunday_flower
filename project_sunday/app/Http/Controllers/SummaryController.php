<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SummaryController extends Controller
{
    //
    public function index(){
        return view('summary.summarize');
    }
    public function transport(){
        return view('summary.transport');
    }
    public function account(){
        return view('summary.account');
    }
}
