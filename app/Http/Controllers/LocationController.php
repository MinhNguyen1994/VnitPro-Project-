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

    public function __construct(){
        $this->middleware('auth:admin');
    }    

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
        LocationService::createPost($request->all());
        return redirect()->route('location');            
    }

    public function delete($id)
    {        
        LocationService::delete($id);
        return redirect()->route('location');    
    }

    public function editGet($id)
    {     
        $data = LocationService::listEditGet($id);                
        return view('locations/create',['data' => $data]);         
    }

    public function editPost(LocationFormRequest $request,$id)
    {                  
        LocationService::editPost($request->all(),$id);
        return redirect()->route('location');        
    }
    
}
?>
