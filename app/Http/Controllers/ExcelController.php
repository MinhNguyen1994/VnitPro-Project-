<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $city = DB::table('cities')->get();
      /*  $district = DB::table('districts')->get();
        $ward = DB::table('wards')->get();*/
    	return view('importExcel',['alert' => '','city' => $city/*,'district' => $district,'ward' =>$ward*/]);
    }

    public function getDataFromID(Request $request){
        $data = $request->all();
        $district = DB::table('districts')->where('id_city',$data['id'])->get();
        return response()->json($district);
    }

    public function postImport(Request $request,$validateImport){

    	if($request->hasfile('file')){    		
    		$path =$request->file('file')->getRealPath();
    		$data = Excel::load($path, function($reader){})->get();    		   		     			  		
    		if(!empty($data) && $data->count()){
                if( $validateImport == 'city'){                
                    $arrData = $data->toArray()[0];
                    $insert = array();
                    foreach($arrData as $value){
                        array_push($insert, ['name_city'=>$value['ten'],'code_city' =>$value['ma_tinh']]);

                    }
                    City::insert($insert);                    
                }
                elseif($validateImport == 'district'){
                    $arrData = $data->toArray()[1];
                    $insert = array();
                    $id_city = DB::table('cities')->select('code_city','id')->get();
                    foreach($id_city as $id){
                       foreach($arrData as $value){                            
                            if($id->code_city == $value['ma_tinhtp']){
                                array_push($insert,['name_district'=>$value['ten'],'code_district'=>$value['ma_huyentpthi_xa'],'id_city'=>$id->id]);
                            }
                       }
                    }
                    District::insert($insert);       
                }
                else{
                    $arrData = $data->toArray()[2];
                    $insert = array();
                    $id_district = DB::table('districts')->select('code_district','id')->get();                   
                    foreach($id_district as $id){
                       foreach($arrData as $value){                            
                            if($id->code_district == $value['ma_huyen']){
                                array_push($insert,['name_ward'=>$value['ten'],'code_ward'=>$value['ma_xaphuongthi_tran'],'id_district'=>$id->id]);
                            }
                       }
                    }
                    Ward::insert($insert);
                }
                return view('importExcel',['alert' => 'Successfull, choose the next one !!']);  			
    		}
    	} else{     		
    		return view('importExcel',['alert' => 'You must choose 1 file']);
    	}
    	
    }

    public function postImportCity(Request $request){        
    	$validateImport = 'city';
        $end = $this->postImport($request, $validateImport);
        return $end;
    }
    public function postImportDistrict(Request $request){        
        $validateImport = 'district';
        $end = $this->postImport($request, $validateImport);
        return $end;
    }
    public function postImportWard(Request $request){            
        $validateImport = 'ward';
        $end = $this->postImport($request, $validateImport);
        return $end;
    }
}
?>
