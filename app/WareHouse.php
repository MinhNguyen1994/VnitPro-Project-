<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WareHouse extends Model
{
    //
    protected $table ="warehouse";

    protected $fillable = [
    	'name_warehouse','description','address','create_at'
    ];
    protected $hidden = [
        'remember_token'
    ];

    public function insert_wh($name,$address,$description){
    	self::insert(['name_warehouse'=> $name,'address'=>$address,'description' =>$description]);
    }

    public function deleteById($id){
    	self::where('id',$id)->delete();
    }

    public function getDataById($id){
    	 self::where('id',$id)->get();

    }    
}
