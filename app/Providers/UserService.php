<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\WareHouse;

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

    public static function getData(){
        $location = WareHouse::all();
        $data = [
            'location' => $location,
        ];
    }
}
