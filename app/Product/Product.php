<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table ="products";

    protected $fillable = [
    	'name_product','code_product','descritption','created_at','quanlity','id_product_group','updated_at'
    ];
    protected $hidden = [
        'remember_token'
    ];
}
