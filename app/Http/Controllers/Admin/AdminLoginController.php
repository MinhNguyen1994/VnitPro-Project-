<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Requests\AdminLoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;	

class AdminLoginController extends Controller
{
    //    
	public function __construct()
	{
		$this->middleware('guest:admin')->except('logout');
	}
	

    public function showLoginForm(){

    	return view('auth.login',['position' => 'Admin']);
    }

    public function login(Request $request){

    	$this->validate($request,[
    		'email' => 'required|email',
            'password' => 'required|min:6'
    	]);
    	
    	
    	if(Auth::guard('admin')->attempt(['email' => $request->email,'password' => $request->password],$request->has('remember'))){
    		return redirect()->intended(route('admin.index'));
    	}
    	return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function logout(){                     
    	Auth::guard('admin')->logout();
    	return redirect()->route('admin.login.form');
    }
}
