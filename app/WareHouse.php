<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WareHouse extends Model
{
    //
    protected $table ="warehouse";

    protected $fillable = [
    	'name_warehouse','description','address','created_at','updated_at'
    ];
    protected $hidden = [
        'remember_token'
    ];     

    public static function getDataById($id){
    	 self::where('id',$id)->get();

    }    
}
