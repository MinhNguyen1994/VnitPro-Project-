<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\WareHouse;

class QuanlityService extends ServiceProvider
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
        $dataQuanlity = [
            'titleSmall' => ' Quanlity',
            'titleMini' =>' List',

        ];
        $dataWareHouse = WareHouse::all();
        $data =[
            'dataQuanlity' => $dataQuanlity,
            'dataWareHouse' => $dataWareHouse
        ];
        return $data;
    }
}
