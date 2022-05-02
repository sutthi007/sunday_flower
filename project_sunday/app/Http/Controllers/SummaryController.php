<?php

namespace App\Http\Controllers;

use App\Models\expenses;
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
        $accountMonth = Order::orderBy('created_at')
                        ->get()
                        ->groupBy(function($Month) {
                            return $Month->created_at->format('m');
                        });
        $accountYear = Order::orderBy('created_at')
                        ->get()
                        ->groupBy(function($Month) {
                            return $Month->created_at->format('Y');

                        });

        return view('summary.account',compact('account','accountMonth','accountYear'));
    }
    public function transport(){
        $sum = Order::orderBy('created_at')
                        ->get()
                        ->groupBy(function($date) {
                            return $date->created_at->format('Y-m-d');
                        });
        $sumMonth = Order::orderBy('created_at')
                        ->get()
                        ->groupBy(function($date) {
                            return $date->created_at->format('m');
                        });
        $sumYear = Order::orderBy('created_at')
                        ->get()
                        ->groupBy(function($date) {
                            return $date->created_at->format('Y');
                        });
        $quantity = Order::all();
        return view('summary.transport',compact('sum','quantity','sumMonth','sumYear'));
    }
    public function viewSum($date){
        $account = Order::whereDate('created_at',$date)
                            ->select('list','province_id','type')
                             ->groupBy('list','province_id','type')->get()
                             ;
        $accounts = Order::whereDate('created_at',$date)->get();
        $expenses = expenses::whereDate('created_at',$date)->get();
        $customPaper = array(0,0,567.00,283.80);
        $pdf = PDF::loadView('sum',compact('account','accounts','expenses'))->setPaper($customPaper, 'landscape');
        return @$pdf->stream();
    }
    public function viewSumMonth($date,$year){
        $account = Order::whereYear('created_at',$year)
                            ->whereMonth('created_at',$date)
                            ->select('list','province_id','type')
                            ->groupBy('list','province_id','type')->get()
                             ;
        $accounts = Order::whereYear('created_at',$year)
                            ->whereMonth('created_at',$date)
                            ->get();
        $expenses = expenses::whereYear('created_at',$year)
                                ->whereMonth('created_at',$date)
                                ->get();
        $pdf = PDF::loadView('sum-month',compact('account','accounts','expenses'));
        return @$pdf->stream();
    }
    
    public function viewreportMonth($month,$year){
        $report = Order::whereYear('created_at',$year)
                            ->whereMonth('created_at',$month)
                            ->select('province_id')
                            ->groupBy('province_id')
                            ->get()
                             ;
        $reports = Order::whereYear('created_at',$year)
                            ->whereMonth('created_at',$month)
                            ->get();

        $pdf = PDF::loadView('report-month',compact('report','reports'));
        return @$pdf->stream();
    }
}
