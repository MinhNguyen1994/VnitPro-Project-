<?php

namespace App\Providers\User;

use Illuminate\Support\ServiceProvider;
use App\WareHouse;
use App\Product\Product;
use App\Product\Unit;
use App\Product\WareHouseProductRes;
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
        $data = [
            'dataWareHouse' => $dataWareHouse,
            'dataProduct'   => $dataProduct,           
        ];
        return $data;
    }

    public static function getdata($id_product)
    {
        $data = Product::where('id',$id_product)->with('unit')->first();
        return $data;
    }

    public static function getDataExport($request)
    {
        $data = WareHouseProductRes::join('products','warehouse_product_res.product_id','products.id')->join('product_units','products.unit_id','product_units.id')->select('products.name_product','product_units.name','product_id','quanlity')->where('product_id',$request->product_id)->where('warehouse_id',$request->location_id)->first();
        return $data;
    }

    public static function getDataRes($location)
    {        
        $data = WareHouseProductRes::join('products','warehouse_product_res.product_id','products.id')->join('product_units','products.unit_id','product_units.id')->select('products.name_product','product_units.name','product_id')->where('warehouse_id',$location['id'])->get();
        return $data;
    }
    
    public static function getQuanlity($request)
    {
        $data = WareHouseProductRes::select('quanlity')->where('product_id',$request->product_id)->where('warehouse_id',$request->location_id)->first();
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
            $check = WareHouseProductRes::where('product_id', $value['id_product'])->where('warehouse_id',$data['detail']['location'])->first();
            if($check == null){                                
                $quanlity_change = $value['quanlity'];                
            }else{ 
                if($data['detail']['action'] == 0){
                    $quanlity_change = $check->quanlity + $value['quanlity'];
                } else{
                    $quanlity_change = $check->quanlity - $value['quanlity'];
                }              
            }
            WareHouseProductRes::updateOrCreate([
                'product_id' => $value['id_product'],
                'warehouse_id'  => $data['detail']['location']
            ],[
                'quanlity' => $quanlity_change,
                'updated_at' => $time 
            ]);          
        }
    }

    public static function viewExport()
    {
        $warehouse = WareHouse::with('bill')->get();        
        $dataBill = Bill::with('product','warehouse')->get();
        return $data =[
            'warehouse' => $warehouse,
            'dataBill'  => $dataBill
        ];
    }

    public static function getHistory()
    {
        $data = Bill::orderBy('id','desc')->with('warehouse','product')->get();        
        return $data;     
    }

    public static function getListWh()
    {
        $dataWh = WareHouse::get();
        return $data = [
            'warehouse' => $dataWh,
        ];
    }

    public static function getAjaxProduct($request)
    {
        $data = WareHouseProductRes::join('products','warehouse_product_res.product_id','products.id')->join('product_units','products.unit_id','product_units.id')->select('products.name_product','product_units.name','quanlity','warehouse_product_res.created_at','warehouse_product_res.updated_at','product_id')->where('warehouse_id',$request->id)->get();
        return $data;
    }

    public static function getLocation($request)
    {
        $data = WareHouseProductRes::select('location_product','product_id')->where('product_id',$request->product_id)->where('warehouse_id',$request->warehouse_id)->first();
        return $data;
    }

    public static function editLocation($request)
    {
        $data = WareHouseProductRes::updateOrCreate(
            [
                'product_id' => $request->product_id,
                'warehouse_id'  => $request->warehouse_id
            ],[
                'location_product' => $request->location
        ]);
        return $data;
    }
}
