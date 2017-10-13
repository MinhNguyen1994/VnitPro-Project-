<?php

namespace App\Providers\User;

use Illuminate\Support\ServiceProvider;
use App\WareHouse;
use App\Product\Product;
use App\Product\Unit;

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
        $dataProduct    = Product::all();
        $dataUnit       = Unit::all();
        $data = [
            'dataWareHouse' => $dataWareHouse,
            'dataProduct'   => $dataProduct,
            'action'    => 'Import',
        ];
        return $data;
    }
}
