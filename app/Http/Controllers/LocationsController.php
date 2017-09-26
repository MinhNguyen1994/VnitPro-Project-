<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Locations;
use Illuminate\Support\Facades\DB;


class LocationsController extends Controller 
{
    //
    function __construct(){
    	$this->model = new Locations();
    }    
    public function index(){
    	$data = $this->model->getData();    	  	
    	return view('home',['data' => $data]);    	
    }
}
