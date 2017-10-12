<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\QuanlityService;

class QuanlityController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:admin');
    } 

    public function index(){
    	$data = QuanlityService::getData();
    	return view('products/quanlity',['data' => $data]);
    }
}
