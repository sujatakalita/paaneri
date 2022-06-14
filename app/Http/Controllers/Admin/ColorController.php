<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ProductColour;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function getProductColors($id)
    {
        $get_product_colors['data'] = ProductColour::select('id','product_id','colour','is_default')->where('product_id', $id)->get();
        return response()->json($get_product_colors);
    }

    public function saveColor(Request $request)
    {
        try {
            $data=[
               'product_id' => $request->product_id,
               'colour' => $request->colour
            ];
            $savecolor = ProductColour::create($data);
            if($savecolor){
                echo "1";
            } else {
                echo "2";
            }
        } catch (\Throwable $th) {
            echo "3";
        }
    }


    public function deleteColor(Request $request)
    {
        try{
            $deleteColor = ProductColour::where('id',$request->id)->first();
            $data = [
                'deleted_at'=>date("Y-m-d H:i:s")
            ];
            $deleteColor->update($data);
            if($deleteColor){
                echo "1";
            }
        } catch (\Throwable $th) {
            echo "2";
        }
    }
}
