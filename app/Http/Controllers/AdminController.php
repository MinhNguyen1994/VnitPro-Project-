<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //   
    public function index(){
    	return view('test');
    }

    public function login(){
    	return view('loginAdmin');
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
