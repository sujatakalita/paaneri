<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ProductMeasurmentOption;
use Illuminate\Http\Request;

class SpecificationOptionController extends Controller
{
    public function getProductSpecificationOption($ids, $product_id)
    {
        $get_product_measurment_option['data'] = ProductMeasurmentOption::select('id','product_id','product_measurment_id','name','amount')->where('product_id', $product_id)->where('product_measurment_id', $ids)->get();
        return response()->json($get_product_measurment_option);
    }

    public function deleteProductMeasurmentOption(Request $request)
    {
        try{
            $deleteOption = ProductMeasurmentOption::where('id',$request->id)->first();
            $data = [
                'deleted_at'=>date("Y-m-d H:i:s")
            ];
            $deleteOption->update($data);
            if($deleteOption){
                echo "1";
            }
        } catch (\Throwable $th) {
            echo "2";
        }
    }

    public function saveSpecificationOption(Request $request)
    {
        try {
            if(ProductMeasurmentOption::measurmentOptionAlredyUse($request->product_id, $request->product_measurment_id, $request->name)){
                echo "2";
            }
            else {
                $data=[
                    'product_id' => $request->product_id,
                    'product_measurment_id' => $request->product_measurment_id,
                    'name'=> $request->name,
                    'amount' => $request->amount
                ];
                $product_specification_option = ProductMeasurmentOption::create($data);
                if($product_specification_option){
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
