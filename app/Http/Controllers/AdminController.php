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
}
