<?php

namespace App\History;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    //
     protected $table = "bill_details";

    protected $fillable = [
    	'id_product','quanlity_change','id_bill'
    ];
    protected $hidden = [
        'remember_token',
    ];

}
