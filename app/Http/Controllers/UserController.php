<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\UserService;

class UserController extends Controller
{
    //
    public function index(){
    	$data = UserService::getData();
    	return view('user/index',['data' => $data]);
    }

    
}
