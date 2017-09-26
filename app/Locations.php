<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Locations extends Model
{
    //
    protected $table = 'locations';

	protected $fillable = ['name_location','address','description'];

    public $timestamps = false;

    public function getData(){
    	$data = locations::all();
    	return $data;
    }    
    
}
