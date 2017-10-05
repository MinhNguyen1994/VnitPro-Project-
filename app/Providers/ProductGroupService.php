<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product\ProductGroup;

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
}
