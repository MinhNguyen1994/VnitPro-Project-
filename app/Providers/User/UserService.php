<?php

namespace App\Providers\User;

use Illuminate\Support\ServiceProvider;
use App\WareHouse;
use App\Product\Product;
use App\Product\Unit;
use Illuminate\Pagination\Paginator;

class UserService extends ServiceProvider
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

    public static function viewImport()
    {   
        $dataWareHouse  = WareHouse::all();
        $dataProduct    = Product::with('unit')->get();
        $dataProduct2   = Product::paginate(1);        
        $data = [
            'dataWareHouse' => $dataWareHouse,
            'dataProduct'   => $dataProduct,
            'action'        => 'Import',            
            'dataProduct2'  => $dataProduct2
        ];
        return $data;
    }

    public static function getdata($id_product)
    {
        $data = Product::where('id',$id_product)->with('unit')->first();
        return $data;
    }
}
