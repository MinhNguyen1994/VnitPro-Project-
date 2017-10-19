<?php

namespace App\History;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    protected $table = "bills";

    protected $fillable = [
    	'name','code','user_id','warehouse_id','action','created_at',
    ];
    protected $hidden = [
        'remember_token','updated_at'
    ];

    public function bill_detail()
    {
    	return $this->hasMany('App\History\BillDetail');
    }
    public function warehouse()
    {
    	return  $this->belongsTo('App\WareHouse');
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function product()
    {
    	return $this->belongsToMany('App\Product\Product','bill_details')->withPivot('quanlity_change');
    }

}
