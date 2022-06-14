<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ProductSize;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function getSize($id)
    {
        $get_product_size['data'] = ProductSize::select('id','product_id','unit_name','is_active')->where('product_id', $id)->where('is_active', 1)->get();
        return response()->json($get_product_size);
    }

    public function saveSize(Request $request){
         try {
            if(ProductSize::sizeAlredyUse($request->product_id, $request->unit_name)){
                echo "2";
            }
            else {
                $data=[
                    'product_id' => $request->product_id,
                    'unit_name' => $request->unit_name,
                    'is_active'=>$request->status
                ];
                $product_size = ProductSize::create($data);
                if($product_size){
                    echo "1";
                } else {
                    echo "3";
                }
            }
         } catch (\Throwable $th) {
            echo "4";
         }
    }
}
