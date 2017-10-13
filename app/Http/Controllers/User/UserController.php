<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\User\UserService;

class UserController extends Controller
{
    //

    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(){
    	echo "ok";
    }

    public function actionImport()
    {	
    	$data = UserService::viewImport(); 
    	return view('users.index',['data' =>$data]);
    }

    public function actionExport()
    {
    	return view('users.index');
    }

}
