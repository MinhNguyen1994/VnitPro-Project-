<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\ProductService;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:admin');
    } 

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

    public function createPost(Request $request)
    {   
        if($request->has('formProduct')){                                    
            ProductService::createProduct($request->all());
            return redirect('product');            
        }
        if($request->has('formUnit')){                        
            ProductService::createUnit($request->all());
            return redirect('product/create');           
        }        
    }

    public function delete($id)
    {
        ProductService::delete($id);
        return redirect('product');
    }

    public function editGet($id)
    {
        $data = ProductService::editGet($id);
        return view('products/create',['data' => $data]);
    }

    public function editPost(ProductRequest $request,$id)
    {   
        ProductService::editProduct($request->all(),$id);
        return redirect('product');     
    }   


}
