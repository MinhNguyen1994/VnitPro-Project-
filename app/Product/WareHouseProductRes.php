<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Model;

class WareHouseProductRes extends Model
{
    //
    protected $table = "warehouse_product_res";

    protected $fillable =[
    	'warehouse_id','product_id','quanlity',
    ];

    protected $hidden = [
    	'remember_token'
    ];

    public function warehouse()
    {
    	return $this->belongsTo('App\warehouse','warehouse_id');
    }
}
