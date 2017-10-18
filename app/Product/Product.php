<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table ="products";

    protected $fillable = [
    	'name_product','code_product','descritption','created_at','unit_id','product_group_id','updated_at',
    ];
    protected $hidden = [
        'remember_token'
    ];

    public function unit()
    {
    	return $this->belongsTo('App\Product\Unit');
    }

    public function product_group()
    {
        return $this->belongsTo('App\Product\ProductGroup');
    }
}
