<?php

namespace App\Providers\User;

use Illuminate\Support\ServiceProvider;
use App\WareHouse;
use App\Product\Product;
use App\Product\Unit;
use Illuminate\Pagination\Paginator;
use App\History\Bill;
use App\History\BillDetail;

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

    public static function postImport($data){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = date('Y-m-d H:i:s');        
        $historyBill = new Bill();
        $historyBill->name = $data['detail']['name'];
        $historyBill->code = $data['detail']['code'];
        $historyBill->warehouse_id = $data['detail']['location'];
        $historyBill->action = $data['detail']['action'];
        $historyBill->user_id = $data['detail']['employee'];
        $historyBill->name = $data['detail']['name'];
        $historyBill->created_at = $time;
        $historyBill->save();

        foreach($data['dataArr'] as $value){            
            $detailBill = new BillDetail();
            $detailBill->product_id = $value['id_product'];
            $detailBill->quanlity_change = $value['quanlity'];
            $detailBill->bill_id = $historyBill->id;
            $detailBill->created_at = $time;
            $detailBill->save();
        }
    }

    public static function getHistory(){
        $data = Bill::with('bill_detail')->get();
        return $data;     
    }
}
