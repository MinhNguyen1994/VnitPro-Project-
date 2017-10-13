<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\ProductService;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUnit;

class ProductController extends Controller
{
    // MIDDLEWARE TO A ADMIN PAGES
    public function __construct(){
        $this->middleware('auth:admin');
    }
    // END


    // VIEW PRODUCTS
    public function index()
    {
    	$data = ProductService::index();    	
    	return view('products/index',['data' => $data]);
    }
    // END 


    // CREATE PRODUCT
    public function createGet()
    {
    	$data = ProductService::createGet();        
    	return view('products/create',['data' => $data]);
    }
    public function createPost(ProductRequest $request)
    {   
        if($request->has('formProduct')){                                    
            ProductService::createProduct($request->all());
            return redirect()->route('product');            
        }
        if($request->has('formUnit')){                        
            ProductService::createUnit($request->all());
            return redirect()->route('product.create');           
        }        
    }
    // END 


    // DELETE PRODUCT
    public function delete($id)
    {
        ProductService::delete($id);
        return redirect()->route('product');
    }
    // END


    // EDIT PRODUCT
    public function editGet($id)
    {
        $data = ProductService::editGet($id);
        return view('products/create',['data' => $data]);
    }

    public function editPost(ProductRequest $request,$id)
    {   
        ProductService::editProduct($request->all(),$id);
        return redirect()->route('product');     
    }
    // END


    // CREATE UNIT
    public function createUnit(Request $request)
    {   
        ProductService::createUnit($request->all());
        return redirect()->route('product.create');
    }
    // END
}
