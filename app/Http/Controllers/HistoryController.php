<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryBillController extends Controller
{
    //

    public function listBills(){
    	return view('history/bill');
    }
}
