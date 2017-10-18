<?php

namespace App\History;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    protected $table = "bills";

    protected $fillable = [
    	'name_bill','code_bill','id_user','id_location','actions','created_at','description',
    ];
    protected $hidden = [
        'remember_token','updated_at'
    ];

     public function bill_detail()
    {
    	return $this->hasMany('App\History\BillDetail');
    }    
}
