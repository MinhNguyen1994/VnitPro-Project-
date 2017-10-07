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
        $dataProduct = [
            'titleSmall'        => 'Create',
            'titlePage'         => 'Create A New Product',
            'titleMini'         => ' Create',
            'name_product'      => '',
            'description'       => '',
            'code_product'      => '',
            'quanlity'          => '',
        ];
        $data = [           
            'dataUnit'      =>  $dataUnit,
            'dataProduct'   =>  $dataProduct
        ];        
        return $data;
    }
}
