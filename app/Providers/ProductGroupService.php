<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product\ProductGroup;

use Session;


class ProductGroupService extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public static function index()
    {
        $data = ProductGroup::all();
        return $data;          
    }

    public static function listCreateGet()
    {
        $data = [
            'titleSmall'            => 'Create',
            'titlePage'             => 'Create A New Group',
            'titleMini'             => ' Create',
            'name_product_group'    => '',
            'description'           => '',
            'code_product_group'    => '',
        ];
        return $data;
    }

    public static function createPost($data){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = date('Y-m-d H:i:s');
        $ProductGroup = new ProductGroup();
        $ProductGroup->name_product_group = $data['name'];
        $ProductGroup->description = $data['description'];
        $ProductGroup->code_product_group = $data['code'];
        $ProductGroup->created_at = $time;
        $ProductGroup->save();
        Session::flash('success','Successfull Created');
    }

    public static function listEditGet($id)
    {   
        $ProductGroup = ProductGroup::where('id',$id)->first()->toArray();
        $data = [
            'titleSmall'            => 'Edit',
            'titlePage'             => 'Edit The Location : ' .$ProductGroup['name_product_group'],
            'titleMini'            => ' Edit',
            'name_product_group'    => $ProductGroup['name_product_group'],
            'code_product_group'    => $ProductGroup['code_product_group'],
            'description'           => $ProductGroup['description']
        ];
        return $data;
    }

    public static function editPost($data,$id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = date('Y-m-d H:i:s');
        $ProductGroup = ProductGroup::find($id);
        $ProductGroup->name_product_group = $data['name'];
        $ProductGroup->code_product_group = $data['code'];
        $ProductGroup->description = $data['description'];
        $ProductGroup->updated_at = $time;
        $ProductGroup->save();
        Session::flash('success','Successfull Edited');
    }

    public static function delete($id)
    {
        ProductGroup::find($id)->delete();
        Session::flash('success','Successfull Deleted');
    }
}
