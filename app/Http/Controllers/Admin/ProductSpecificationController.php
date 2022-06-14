<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ProductMeasurment;
use Illuminate\Http\Request;

class ProductSpecificationController extends Controller
{
    public function getProductSpecification($id)
    {
        $get_product_measurments['data'] = ProductMeasurment::select('id','product_id','filed_type','is_required','name','status','amount')->where('product_id', $id)->get();
        return response()->json($get_product_measurments);
    }

    public function saveSpecification(Request $request)
    {
        try {
            if(ProductMeasurment::measurmentAlredyUse($request->product_id, $request->name)){
                echo "2";
            }
            else {
                $data=[
                    'product_id' => $request->product_id,
                    'filed_type' => $request->filed_type,
                    'is_required'=> $request->is_required,
                    'name' => $request->name,
                    'status' => $request->status,
                    'amount' => $request->amount
                ];
                $product_specification = ProductMeasurment::create($data);
                if($product_specification){
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
