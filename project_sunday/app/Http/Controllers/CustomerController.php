<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function index(){

        $customers = customer::all();
        return view('customer.customer',compact('customers'));
    }
}
