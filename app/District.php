<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //
    protected $table ="districts";

    protected $fillable = [
    	'name_district','description','code_city','code_district'
    ];
    protected $hidden = [
        'remember_token'
    ];

    public static function getDistrict(){
    	return self::select('id','code_district')->get();
    }

    public function getNameByCode($code_city){
        return self::select('name_district','code_district')->where('code_city',$code_city)->get();
    }
    public static function getName($code_district){
        return self::select('name_district')->where('code_district',$code_district)->get();
    }
}
