<?php

namespace App\Http\Controllers\product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\ProductGroupService;

class ProductGroupController extends Controller
{
    //

    public function index(){
    	$data = ProductGroupService::index();
    	return view('productGroups/index');
    }
}
