<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\PDF;

class SummaryController extends Controller
{
    //
    public function index(){
        return view('summary.summarize');
    }
    public function transport(){
        $sum = Order::orderBy('created_at')

                        ->get()
                        ->groupBy(function($date) {
                            return $date->created_at->format('Y-m-d');
                        });
        return view('summary.transport',compact('sum'));
    }
    public function account(){
        $account = Order::orderBy('created_at')

                        ->get()
                        ->groupBy(function($date) {
                            return $date->created_at->format('Y-m-d');
                        });
        return view('summary.account',compact('account'));
    }
    public function viewSum(){
        $orders = Order::all();

        $pdf = PDF::loadView('sum',compact('orders'));
        return @$pdf->stream();
    }
}
