<?php

namespace App\Http\Controllers\History;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryBillController extends Controller
{
    //

    public function listBills(){
    	return view('history/bill');
    }
}
