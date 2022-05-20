<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\expenses;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\PDF;
use App\Services\ThaiDateHelperService;
use App\Models\province;

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
    public function chart($date,$year,Request $request){
        $useMonths = Order::whereMonth('created_at',$date)->select('type')->groupBy('type')->get();
        // Year now
        $acMonths = customer::whereYear('created_at',$year)->orderBy('created_at', 'asc')->select('created_at')->get()->groupBy(function($data){
            return $data->created_at->format('m');
        });
        // oldyear
        $oldYear = $year - 1;
        $acOldMonths = customer::whereYear('created_at',$oldYear)->select('created_at')->get()->groupBy(function($data){
            return $data->created_at->format('m');
        });
        // oldyear
        $oldSum=[];
        foreach($acOldMonths as $account=>$row){
            $accountTotal = customer::whereYear('created_at',$oldYear)->whereMonth('created_at',$account)->get();
            $sum = 0;
            foreach($accountTotal as $row){     
            $sum = $row->total + $sum;  
            }
            $oldSum[] = $sum;
        }
        // Year now
        $test=[];
        $test1=[];     
        foreach($acMonths as $account=>$row){
            $test[] = ThaiDateHelperService::simpleDateFormatchart($account);
            $accountTotal = customer::whereYear('created_at',$year)->whereMonth('created_at',$account)->get();
            $sum = 0;
            foreach($accountTotal as $row){     
            $sum = $row->total + $sum;  
            }
            $test1[] = $sum;
        }
        // Type for year
        $MonthType= [];
        $countTypeflower = [];
        $countTypeParcel = [];
        $countTypeAnimal = [];
        $countTypeMotocle = [];
        $countTypeVagetable = [];  
        $typeMonths = Order::whereYear('created_at',$year)->select('type')->groupBy('type')->get();
        foreach($typeMonths as $rowtypeMounths){
            $typeMonthsCount = Order::whereYear('created_at',$year)->where('type',$rowtypeMounths->type)->orderBy('created_at', 'asc')->select('created_at')->get()->groupBy(function($data){
                return $data->created_at->format('m');
            });
            foreach($typeMonthsCount as $rowdata => $key){
                $quantityType = Order::whereYear('created_at',$year)->whereMonth('created_at',$rowdata)->where('type',$rowtypeMounths->type)->get();
                    
                $countTypes = 0;
                foreach($quantityType as $countInt){
                    $countTypes = $countTypes+$countInt->quantity;
                } 
                if($countInt->type == 'ดอกไม้'){
                    $MonthType[] = ThaiDateHelperService::simpleDateFormatchart($rowdata);
                    $countTypeflower[] = $countTypes;
                }elseif($countInt->type == 'ผักและผลไม้'){
                    $countTypeVagetable[] = $countTypes;
                }elseif($countInt->type == 'มอเตอร์ไซต์'){
                    $countTypeMotocle[] = $countTypes;
                }elseif($countInt->type == 'สัตว์เลี้ยง'){
                    $countTypeAnimal[] = $countTypes;
                }else{
                    $countTypeParcel[] = $countTypes;
                }
            }
        }
        // Type for months
        $months=[];
        $monthscount=[];
        foreach($useMonths as $type){
            $months[]=$type->type;
            $useType = Order::where('type',$type->type)->whereYear('created_at',$year)->whereMonth('created_at',$date)->get();
            $countTypeUse = 0;
            foreach($useType as $type){
                $countTypeUse = $type->quantity + $countTypeUse;
            } 
            $monthscount[]=$countTypeUse;
        }
        // Report for Top 10 usefully province now year
        $transport = Order::whereYear('created_at',$year)->select('province_id')->groupBy('province_id')->get();
        foreach($transport as $reportTransport){
            $transport1 = Order::whereYear('created_at',$year)->where('province_id',$reportTransport->province_id)->get();
            $use_more = 0;
            foreach($transport1 as $count){
               $use_more = $use_more + 1;
            }
            $province  = Province::find($reportTransport->province_id);
            $province->use_more = $use_more;
            $province->save();
        } 
        // Report for Top 10 usefully province old year
        $transport = Order::whereYear('created_at',$oldYear)->select('province_id')->groupBy('province_id')->get();
        foreach($transport as $reportTransport){
            $transport1 = Order::whereYear('created_at',$oldYear)->where('province_id',$reportTransport->province_id)->get();
            $old_more = 0;
            foreach($transport1 as $count){
               $old_more = $old_more + 1;
            }
            $province  = Province::find($reportTransport->province_id);
            $province->old_more = $old_more;
            $province->save();
        } 
        $top = Province::orderBy('use_more','desc')->limit(10)->get();
        $top10name = [];
        $top10sum = [];
        $top10sumold = [];
        foreach($top as $rowtop){
            $top10name[] = $rowtop->province;
            $top10sum[] = $rowtop->use_more;
            $top10sumold[] = $rowtop->old_more;
        }
        return view('chart',compact('months','monthscount','test1','test','year','oldSum','oldYear','top10name','top10sum','top10sumold','MonthType','countTypeflower','countTypeVagetable','countTypeMotocle','countTypeAnimal','countTypeParcel'));
    }
}
