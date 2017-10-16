<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //

    protected $table = 'product_units';

    protected $fillable = [
    	'name','code','descritption','create_at','updated_at'
    ];
    protected $hidden = [
        'remember_token'
    ];

    public function product(){
    	return $this->hasOne('App\Product\Product');
    }
}
