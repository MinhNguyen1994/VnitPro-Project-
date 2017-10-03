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
use Session;

class LocationController extends Controller
{
    //  

    public function index(){
    	$warehouseObj = new WareHouse();
    	$data = $warehouseObj->all();    	
    	return view('locations/locations',['data' => $data ]);
    }

    public function getCodeCity(Request $request){              
        $districtObj = new District();
        $code_city = $request->code_city;
        $district = $districtObj->getNameByCode($code_city);    


        return Response::json($district);       
    }

    public function getCodeDistrict(Request $request){              
        $wardObj = new Ward();
        $code_district = $request->code_district;
        $ward = $wardObj->getNameByCode($code_district);    

        return Response::json($ward);       
    }

    public function createGet(){
        $titlePage = 'Create A New Location';
    	$cityObj = new City();     	
    	$city = $cityObj->all();
        $name_warehouse ='';
        $address ='';
        $description ='';
        $val_city = '';
        $val_district ='';
        $val_ward ='' ;      

    	return view('locations/create',
            [   'city' => $city,
                'name_warehouse' => $name_warehouse,
                'address'=> $address,
                'description'=>$description,
                'val_city' =>$val_city,
                'titlePage' => $titlePage, 
                'val_district' => $val_district,
                'val_ward' => $val_ward              
            ]);
    }

    

    public function createPost(Request $request){
        $cityObj = new City();      
        $districtObj = new District();
        $wardObj = new Ward();
        $warehouseObj = new WareHouse();
        $dataCity = $cityObj->getName($request->city);
        $dataDistrict = $districtObj->getName($request->district);
        $dataWard = $wardObj->getName($request->ward);

        
        $address = $request->address." - ".$dataWard[0]['name_ward']." - ".$dataDistrict[0]['name_district']." - ".$dataCity[0]['name_city'];
        $warehouseObj->insert_wh($request->name,$address,$request->description);

        Session::flash('success','Successfull Created');
        return redirect('location');
        
    }

    public function delete($id){        
        $warehouseObj = new WareHouse();
        $warehouseObj->deleteById($id);
        Session::flash('success','Successfull Deleted');
        return redirect('location');    
    }

    public function editGet($id){        
        $warehouseObj = new WareHouse();
        $cityObj = new City();
        $districtObj = new District();
        $wardObj = new Ward();
        $city = $cityObj->all();                   
        $warehouseId = $warehouseObj->where('id',$id)->get();
        
        foreach($warehouseId as $value){
            $name_warehouse = $value->name_warehouse;
            $titlePage = 'Edit The Location : ' .$value->name_warehouse;
            $description = $value->description;
            $addressObj = $value->address;
        }
        $addressArray = explode(' - ', $addressObj);

        $val_city = $addressArray[3];

        $val_district = $addressArray[2];
        $district_codeCity = $districtObj->select('code_city')->where('name_district',$val_district)->get()->toArray();     
        $district_info = $districtObj->select('name_district','code_district')->where('code_city',$district_codeCity)->get();

        $val_ward = $addressArray[1];
        $ward_codeDistrict = $wardObj->select('code_district')->where('name_ward',$val_ward)->get()->toArray();
        $ward_info = $wardObj->select('name_ward','code_ward')->where('code_district',$ward_codeDistrict)->get();   

        $address = $addressArray[0];

        return view('locations/create',
            [   'city' => $city,
                'name_warehouse' => $name_warehouse,
                'address'=> $address,
                'description'=>$description,
                'val_city' =>$val_city,
                'titlePage' => $titlePage,
                'district_info' => $district_info,
                'ward_info' => $ward_info,
                'val_district' => $val_district,
                'val_ward' => $val_ward
            ]);
         
    }

    public function editPost(Request $request,$id){        
        $dataCity = City::getName($request->city);
        $dataWard = Ward::getName($request->ward);
        $dataDistrict = District::getName($request->district);

        $address = $request->address." - ".$dataWard[0]['name_ward']." - ".$dataDistrict[0]['name_district']." - ".$dataCity[0]['name_city'];
        $warehouse = WareHouse::find($id);
        $warehouse->name_warehouse = $request->name;
        $warehouse->address = $address;
        $warehouse->description = $description;
        $warehouse->save();
        Session::flash('success','Successfull Edited');
        return redirect('location'); 

    }
    
}
