<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PositionUser extends Model
{
    //

    protected $table ="positions";

    protected $fillable =[
    	'name_position','code_position','description'
    ];
    protected $hidden =[
    	'remember_token'
    ];

}
