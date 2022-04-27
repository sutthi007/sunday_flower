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
   
    public function account(){
        $account = Order::orderBy('created_at')

                        ->get()
                        ->groupBy(function($date) {
                            return $date->created_at->format('Y-m-d');
                        });
        return view('summary.account',compact('account'));
    } 
    public function transport(){
        $sum = Order::orderBy('created_at')
                        ->get()
                        ->groupBy(function($date) {
                            return $date->created_at->format('Y-m-d');
                        });
        $quantity = Order::all();
        return view('summary.transport',compact('sum','quantity'));
    }
    public function viewSum($date){
        $account = Order::whereDate('created_at',$date)
                            ->select('list','province_id')
                             ->groupBy('list','province_id')->get()
                             ;
        $accounts = Order::whereDate('created_at',$date)->get();
                        
        $pdf = PDF::loadView('sum',compact('account','accounts'));
        return @$pdf->stream();
    }
}
