<?php

namespace App\History;

use Illuminate\Database\Eloquent\Model;

class HistoryBills extends Model
{
    //
    protected $table "history_bills";

    protected $fillable = [
    	'name_bill','code_bill','id_user','id_location','actions','created_at','description',
    ];
    protected $hidden = [
        'remember_token','updated_at'
    ];    
}
