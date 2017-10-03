<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    //
    protected $table ="wards";

    protected $fillable = [
    	'name_ward','description','code_ward','code_district'
    ];
    protected $hidden = [
        'remember_token'
    ];

    public function getNameByCode($code_district){
        return self::select('name_ward','code_ward')->where('code_district',$code_district)->get();
    }
    public static function getName($code_ward){
    	return self::select('name_ward')->where('code_ward',$code_ward)->get();
    }
    


}
