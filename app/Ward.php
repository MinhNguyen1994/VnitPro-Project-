<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    //
    protected $table ="wards";

    protected $fillable = [
    	'name_ward','description','id_district','code_ward'
    ];
    protected $hidden = [
        'remember_token'
    ];
    


}
