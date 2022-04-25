<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
    public function viewSum(){
        $orders = Order::all();

        return view('sum',compact('orders'));
    }
}
