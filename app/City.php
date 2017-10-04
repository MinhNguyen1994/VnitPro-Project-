<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $table ="cities";

    protected $fillable = [
    	'name_city','description','code_city'
    ];
    protected $hidden = [
        'remember_token'
    ];

    public static function getName($code_city){
    	return self::select('name_city')->where('code_city',$code_city)->first();
    }
}
