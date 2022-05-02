<?php

namespace App\Http\Controllers;

use App\Models\expenses;
use Illuminate\Http\Request;
use Carbon\Carbon;

class expensesController extends Controller
{
    //
    public function index(){
        $expenses = expenses::whereDate('created_at',Carbon::today())->get();

        return view('summary.expenses',compact('expenses'));
    }
    public function edit($id){
        $expenses = expenses::find($id);

        return view('summary.expenses-editor',compact('expenses'));
    }
    public function update($id,Request $request){
        $expenses = expenses::find($id);

        $expenses->update($request->all());

        return redirect()->route('expenses.index');
    }
    public function store(Request $request){
        $expenses = expenses::create([
            'list' => $request->list,
            'price' => $request->price,
        ]);

        return redirect()->route('expenses.index');
    }
    public function destroy($id){
        $expenses = expenses::find($id);

        $expenses->delete();

        return redirect()->route('expenses.index');
    }
}
