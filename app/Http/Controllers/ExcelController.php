<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use App\City;
use App\District;
use App\Ward;

class ExcelController extends Controller
{
    //

    public function getImport(){
        $city = City::all();
        $districts = District::all();
    	return view('importExcel',['alert' => '','city' => $city,'districts' =>$districts]);
    }    

    public function postImport(Request $request){
        $validateImport = $request->location;
        $cityObj = new City();
        $districtObj = new District();
        $wardObj = new Ward();        

    	if($request->hasfile('file') && !empty($validateImport)){    		
    		$path =$request->file('file')->getRealPath();
    		$data = Excel::load($path, function($reader){})->get();    		   		     			  		
    		if(!empty($data) && $data->count()){
                if( $validateImport == 'City'){                
                    $arrData = $data->toArray()[0];
                    $insert = array();
                    foreach($arrData as $value){
                        array_push($insert, ['name_city'=>$value['ten'],'code_city' =>$value['ma_tinh']]);

                    }
                    $cityObj->insert($insert);                    
                }
                elseif($validateImport == 'District'){
                    $arrData = $data->toArray()[1];
                    $insert = array();
                    $id_city = City::all();
                    foreach($id_city as $id){
                       foreach($arrData as $value){                            
                            if($id->code_city == $value['ma_tinhtp']){
                                array_push($insert,['name_district'=>$value['ten'],'code_district'=>$value['ma_huyentpthi_xa'],'id_city'=>$id->id]);
                            }
                       }
                    }
                    $cityObj->insert($insert);       
                }
                elseif($validateImport == 'Ward'){
                    $arrData = $data->toArray()[2];
                    $insert = array();                   
                    $arrDistrict = $districtObj->getDistrict();                    
                     
                    /*foreach($arrData as $value){                
                        foreach($arrDistrict as $id){                                                  
                            if($id->code_district == $value['ma_huyen']){
                                array_push($insert,['name_ward'=>$value['ten'],'code_ward'=>$value['ma_xaphuongthi_tran'],'id_district'=>$id->id]);
                            }
                       }
                    }*/
                    foreach ($arrData as $key => $value) {
                       array_push($insert,['name_ward'=>$value['ten'],'code_ward'=>$value['ma_xaphuongthi_tran'],'id_district'=>'1']);
                    }
                    dd($insert);
                    $wardObj->insert($insert);
                }
                return view('importExcel',['alert' => 'ok']);  			
    		}
    	} else{     		
    		return view('importExcel',['alert' => 'You must choose 1 file or pick 1 tag']);
    	}
    	
    }
    
}
?>
