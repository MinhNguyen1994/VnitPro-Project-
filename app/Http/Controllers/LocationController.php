<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LocationFormRequest;
use App\Providers\LocationService;
use Response;
use Validator;


class LocationController extends Controller
{
    //  

    public function index()
    {
    	$data = LocationService::getAllDataLocation();   	
    	return view('locations/locations',['data' => $data ]);
    }

    public function getCodeCity(Request $request)
    {    
        $district = LocationService::getCodeCity($request->code_city);                                                    
        return Response::json($district);

    }

    public function getCodeDistrict(Request $request)
    {        
        $ward = LocationService::getCodeDistrict($request->code_district);
        return Response::json($ward);       
    }

    public function createGet()
    {
        $data = LocationService::listCreateGet();
        return view('locations/create',['data' => $data]);           
    }    

    public function createPost(LocationFormRequest $request)
    {                         
        $validator = Validator::make($request->all());
        if($validator->fails()){                    
            return redirect()->back()->withErrors($validator);
        }else{            
            LocationService::createPost($request->all());
            return redirect('location'); 
        }        
    }

    public function delete($id)
    {        
        LocationService::delete($id);
        return redirect('location');    
    }

    public function editGet($id)
    {     
        $data = LocationService::listEditGet($id);        
        return view('locations/create',['data' => $data]);         
    }

<<<<<<< HEAD
<<<<<<< HEAD
    public function editPost(Request $request,$id){        
        $dataCity = City::getName($request->city);
        $dataWard = Ward::getName($request->ward);
        $dataDistrict = District::getName($request->district);
<<<<<<< HEAD
        print_r($dataCity);
=======
>>>>>>> InWork

        $address = $request->address." - ".$dataWard[0]['name_ward']." - ".$dataDistrict[0]['name_district']." - ".$dataCity[0]['name_city'];
        $warehouse = WareHouse::find($id);
        $warehouse->name_warehouse = $request->name;
        $warehouse->address = $address;
<<<<<<< HEAD
        $warehouse->description = $request->description;
=======
        $warehouse->description = $description;
>>>>>>> InWork
        $warehouse->save();
        Session::flash('success','Successfull Edited');
=======
    public function editPost(Request $request,$id)
    {
        LocationService::editPost($request->city,$request->district,$request->ward,$request->name,$request->address,$request->description,$id); 
>>>>>>> InWork
        return redirect('location'); 
=======
    public function editPost(LocationFormRequest $request,$id)
    {                           
        $validator = Validator::make($request->all());
        if($validator->fails()){                    
            return redirect()->back()->withErrors($validator);
        }else{            
            LocationService::editPost($request->all(),$id);
            return redirect('location'); 
        }     
         
>>>>>>> Inwork
    }
    
}
