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

    public function history(){
        $data = UserService::getHistory();        
        return view('users.history',['data'=> $data]);
    }

    public function actionImport()
    {	
    	$data = UserService::viewImport(); 
    	return view('users.import',['data' =>$data]);
    }

    public function postImport(Request $request)
    {  
        $data = UserService::postImport($request->all());
        return $data;        
    }
    public function actionExport()
    {
        $data = UserService::viewExport();
    	return view('users.export',['data' =>$data]);
    }

    public function getProduct(Request $request){                 
        $data = UserService::getdata($request->product);        
        return Response::json($data);
    }

    public function getProductRes(Request $request){
        $data = UserService::getDataRes($request->all());
        return Response::json($data);
    }

}
