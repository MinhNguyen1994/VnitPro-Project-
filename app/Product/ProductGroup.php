<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    //
    protected $table ="product_groups";

    protected $fillable = [
    	'name_product_group','code_product_group','descritption','create_at','updated_at'
    ];
    protected $hidden = [
        'remember_token'
    ];
   
}
