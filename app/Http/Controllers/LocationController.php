<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Ward;
use App\City;
use App\District;
use App\WareHouse;
use Response;

class LocationController extends Controller
{
    //  

    public function index(){
    	$warehouseObj = new WareHouse();
    	$data = $warehouseObj->all();    	
    	return view('locations/locations',['data' => $data ]);
    }

    public function createGet(){
    	$cityObj = new City();
    	$districtObj = new City();
    	$wardObj = new City();
    	$districtObj = new District();
    	$wardObj = new Ward();
    	$city = $cityObj->all();
    	$district = $districtObj->all();
    	$ward = $wardObj->all();
    	return view('locations/create',['city' => $city,'district' => $district,'ward' => $ward]);
    }

    public function getCodeCity(Request $request){    	

    	$district = District::where('code_city', '=', $request->code_city)->get();

    	return Response::json($district);

    	
    }

    public function createPost(Request $request){

    }
}
