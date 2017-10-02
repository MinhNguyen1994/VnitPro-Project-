<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use City;
use District;
use Ward;
use WareHouse;

class LocationController extends Controller
{
    //
   

    public function index(){
    	$data = $this->warehouse->get();
    	return view('locations/locations',$data);
    }
}
