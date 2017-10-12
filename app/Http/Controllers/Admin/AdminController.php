<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }  	
    
    public function home()
    {
        return view('home');
    }

    public function uploadFile(){
    	if($request->hasfile('file')){
    		$filename  = $request->file->getClientOriginalName();
    		
    		return $request->file->storeAs('public/upload',$filename);
    	}    	
    	$request->all();
    	return view('Successfull Upload','$alert');
    }
}
