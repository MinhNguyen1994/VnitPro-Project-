<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Model;

class WareHouseProductRes extends Model
{
    //
    protected "warehouse_product_res";

    protected $fillable =[
    	'id_warehouse','id_product','quanlity','id_unit'
    ];

    protected $hidden = [
    	'remember_token'
    ];
}
