<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product\Product;
use App\Product\ProductGroup;
use App\Product\Unit;

class ProductService extends ServiceProvider
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
        $dataProduct = Product::all();
        $dataGroup = ProductGroup::all();
        $data = [
            'dataProduct'   => $dataProduct,
            'dataGroup'    => $dataGroup
        ];       
        return $data; 
    }

    public static function createGet()
    {   
        $dataUnit = Unit::all();
        $dataGroup = ProductGroup::all();
        $dataProduct = [
            'titleSmall'        => 'Create',
            'titlePage'         => 'Create A New Product',
            'titleMini'         => ' Create',
            'name_product'      => '',
            'description'       => '',
            'code_product'      => '',
            'quanlity'          => 2,
            'unit'              => '',
        ];
        $data = [           
            'dataUnit'      =>  $dataUnit,
            'dataProduct'   =>  $dataProduct,
            'dataGroup'     =>  $dataGroup
        ];        
        return $data;
    }

    public static function createProduct($data)
    {   
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = date('Y-m-d H:i:s');
        $unit = Unit::where('id',$data['unit'])->first()->toArray();                              
        $quanlity = $data['quanlity']." ".$unit['name'];
        $Product =  new Product();
        $Product->name_product      = $data['name'];
        $Product->quanlity          = $quanlity;
        $Product->code_product      = $data['code'];
        $Product->description       = $data['description'];
        $Product->id_product_group  = $data['productGroup'];
        $Product->created_at        = $time;           
        $Product->save();   
    }

    public static function createUnit($data)
    {   
        $unit = new Unit();
        $unit->name         = $data['name_unit'];
        $unit->code         = $data['code_unit'];
        $unit->description  = $data['description_unit'];
        $unit->save();
    }

    public static function delete($id)
    {
        $data = Product::find($id)->delete();
    }

    public static function editGet($id)
    {
        $dataUnit = Unit::all();
        $dataGroup = ProductGroup::all();
        $getProduct = Product::where('id',$id)->first()->toArray();        
        $quanlityArr = explode(' ', $getProduct['quanlity']);                
        $dataProduct = [
            'titleSmall'        => 'Edit',
            'titlePage'         => 'Edit The Product: ' .$getProduct['name_product'],
            'titleMini'         => ' Edit',
            'name_product'      => $getProduct['name_product'],
            'description'       => $getProduct['description'],
            'code_product'      => $getProduct['code_product'],
            'id_product_group'  => $getProduct['id_product_group'],
            'quanlity'          => $quanlityArr[0],
            'unit'              => $quanlityArr[1],
        ];
        $data = [           
            'dataUnit'      =>  $dataUnit,
            'dataProduct'   =>  $dataProduct,
            'dataGroup'     =>  $dataGroup
        ];        
        return $data;    
    }

    public static function editProduct($data,$id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = date('Y-m-d H:i:s');
        $unit = Unit::where('id',$data['unit'])->first()->toArray();                              
        $quanlity = $data['quanlity']." ".$unit['name'];
        $Product =  Product::find($id);
        $Product->name_product      = $data['name'];
        $Product->quanlity          = $quanlity;
        $Product->code_product      = $data['code'];
        $Product->description       = $data['description'];
        $Product->id_product_group  = $data['productGroup'];
        $Product->updated_at        = $time;           
        $Product->save();
    }
}
