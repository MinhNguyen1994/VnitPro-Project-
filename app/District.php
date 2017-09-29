<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //
    protected $table ="districts";

    protected $fillable = [
    	'name_district','description','id_city'
    ];
    protected $hidden = [
        'remember_token'
    ];
}
