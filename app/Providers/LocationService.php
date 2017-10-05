<?php

namespace App\Providers;

use LocationService\Connection;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Input;

use App\Ward;
use App\City;
use App\District;
use App\WareHouse;
use Session;



class LocationService extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    public static function getAllDataLocation()
    {
        $data = WareHouse::all();
        return $data;       
    }

    public static function getCodeCity($code_city)
    {        
        $data = District::getNameByCode($code_city);
        return $data; 
    }

    public static function getCodeDistrict($code_district)
    {
        $data = Ward::getNamebyCode($code_district);
        return $data;
    }

    public static function listCreateGet()
    {
        $city= City::all();
        $data = array([
            'titleSmall'        => 'Create',
            'titlePage'         => 'Create A New Location',             
            'city'              => $city,
            'name_warehouse'    => '',
            'address'           => '',
            'description'       => '',
            'val_city'          => '',
            'val_district'      => '',
            'val_ward'          => '',
        ]);
        return $data[0];        
    }

    public static function createPost($data)
    {                  
        $dataCity = City::getName($data['city']);
        $dataDistrict = District::getName($data['district']);
        $dataWard =Ward::getName($data['ward']);     
        $address = $data['address']." - ".$dataWard['name_ward']." - ".$dataDistrict['name_district']." - ".$dataCity['name_city'];        
        WareHouse::insert_wh($data['name'],$address,$data['description']);
        Session::flash('success','Successfull Created');
    }

    public static function delete($id){
        $WareHouse = WareHouse::find($id)->delete();                
        Session::flash('success','Successfull Deleted');
    }

    public static function listEditget($id){        
        $city = City::all();
        $WareHouse = WareHouse::where('id',$id)->first();
           
        $addressArray = explode(' - ', $WareHouse->address);        
        $val_city = $addressArray[3];
        $val_district = $addressArray[2];
        $val_ward = $addressArray[1];       

        $district_codeCity = District::select('code_city')->where('name_district',$val_district)->get()->toArray();          
        $district_info = District::select('name_district','code_district')->where('code_city',$district_codeCity)->get();

        $ward_codeDistrict = Ward::select('code_district')->where('name_ward',$val_ward)->get()->toArray();
        $ward_info = Ward::select('name_ward','code_ward')->where('code_district',$ward_codeDistrict)->get();        

        $data = array([
            'titleSmall'        => 'Edit',
            'titlePage'         => 'Edit The Location: ' .$WareHouse->name_warehouse,               
            'city'              => $city,
            'name_warehouse'    => $WareHouse->name_warehouse,
            'address'           => $addressArray[0],
            'description'       => $WareHouse->description,
            'val_city'          => $val_city,
            'val_district'      => $val_district,
            'val_ward'          => $val_ward,
            'district_info'     => $district_info,
            'ward_info'         => $ward_info,
        ]);
        return $data[0];
    }

    public static function editPost($data,$id){
        $dataCity = City::getName($data['city']);
        $dataDistrict = District::getName($data['district']);
        $dataWard =Ward::getName($data['ward']);     
        $address = $data['address']." - ".$dataWard['name_ward']." - ".$dataDistrict['name_district']." - ".$dataCity['name_city'];
        $warehouse = WareHouse::find($id);
        $warehouse->name_warehouse = $data['name'];
        $warehouse->address = $address;
        $warehouse->description = $data['description'];
        $warehouse->save();
        Session::flash('success','Successfull Edited');
    }   

}
?>

