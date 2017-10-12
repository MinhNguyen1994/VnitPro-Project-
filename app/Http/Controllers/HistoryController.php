<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryBillController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:admin');
    } 

    public function listBills(){
    	return view('history/bill');
    }
}
