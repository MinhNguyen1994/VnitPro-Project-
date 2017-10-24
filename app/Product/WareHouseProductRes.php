<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Model;

class WareHouseProductRes extends Model
{
    //
    protected $table = "warehouse_product_res";

    protected $fillable =[
    	'warehouse_id','product_id','quanlity','location_product'
    ];

    protected $hidden = [
    	'remember_token'
    ];

    public function warehouse()
    {
    	return $this->belongsTo('App\warehouse','warehouse_id');
    }

    public function product()
    {
        return $this->hasManyThrough('App\Product\Unit','App\Product\Product','unit_id','product_id');
    }
}
