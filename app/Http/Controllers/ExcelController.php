<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use App\City;
use App\District;

class ExcelController extends Controller
{
    //
    public function getImport(){
    	return view('importExcel',['alert' => '']);
    }

    public function postImportCity(Request $request){
    	if($request->hasfile('file')){    		
    		$path =$request->file('file')->getRealPath();
    		$data = Excel::load($path, function($reader){})->get();
    		echo "<pre>";
    		print_r($data);
    		echo "</pre>";    		     			  		
    		if(!empty($data) && $data->count()){
    			foreach($data->toArray() as $value){
    				if(!empty($value) && $value->count()){
    					foreach($value as $key => $v){
    						
    					}
    				}
    					    				
    				$insert = array();
    				array_push($insert,['name_city' => $value['name_city'],'description' => $value['description']]);
    								
    			}     			
    			
    		}
    	}else{     		
    		return view('importExcel',['alert' => 'You must choose 1 file']);
    	}
    	
    }

    public function postImportDistrict(Request $request){
    	if($request->hasfile('file')){    		
    		$path =$request->file('file')->getRealPath();
    		$data = Excel::load($path, function($reader){})->get();    		     			  		
    		if(!empty($data) && $data->count()){
    			$city = City::select()->get();
    			print_r($city);die();
    			foreach($data->toArray() as $value){    				    				
    				$insert = array();	
    				
    				array_push($insert,['name_district'=>$value['name_district'],'description'=>$value['description'],'name_city'=>$value['name_city']]);    									
    			}
    			     			
    			if(!empty($insert)){

                	City::insert($insert);                
                	return view('importExcel',['alert' => 'Successfull, choose next one']);                	     	             

            	}
    		}
    	}else{     		
    		return view('importExcel',['alert' => 'You must choose 1 file']);
    	}
    }
}
?>
