<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WareHouse extends Model
{
    //
    protected $table ="warehouse";

    protected $fillable = [
    	'name_warehouse','description','address','id_ward'
    ];
    protected $hidden = [
        'remember_token'
    ];

    
}
