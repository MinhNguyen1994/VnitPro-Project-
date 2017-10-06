<?php

namespace App\Http\Controllers\product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\ProductGroupService;
use App\Http\Requests\ProductGroupRequest;

class ProductGroupController extends Controller
{
    //

    public function index(){
    	$data = ProductGroupService::index();
    	return view('productGroups/index',['data' => $data]);
    }

    public function createGet()
    {
        $data = ProductGroupService::listCreateGet();
        return view('productGroups/create',['data' => $data]);           
    }

    public function createPost(ProductGroupRequest $request)
    {   
        ProductGroupService::createPost($request->all());
        return redirect('product/group');
    }

    public function editGet($id)
    {   
        $data = ProductGroupService::listEditGet($id);
        return view('productGroups/create',['data' => $data]);
    }

    public function editPost(ProductGroupRequest $request,$id)
    {          
        ProductGroupService::editPost($request->all(),$id);
        return redirect('product/group');
    }
    public function delete($id)
    {
        ProductGroupService::delete($id);
        return redirect('product/group');
    }    
}
