<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\User\UserService;
use Response;

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

    public function postImport(Request $request)
    {          
        print_r($request->all());
                
    }
    public function actionExport()
    {
    	return view('users.index');
    }

    public function getProduct(Request $request){
                 
        $data = UserService::getdata($request->product);        
        return Response::json($data);
    }

}
