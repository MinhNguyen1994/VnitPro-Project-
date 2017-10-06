<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\ProductService;

class ProductController extends Controller
{
    //

    public function index()
    {
    	$data = ProductService::index();    	
    	return view('products/index',['data' => $data]);
    }

    public function createGet()
    {
    	$data = ProductService::createGet();
    	return view('products/create',['data' => $data]);
    }
}
