<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\ProductAttachment;
use Brian2694\Toastr\Facades\Toastr;
use DB,Crypt,Validator,Str,Redirect,Image, Session;

class AttachmentController extends Controller
{
    public function getProductAttachment($id)
    {
        $get_product_attachment['data'] = ProductAttachment::select('id','product_id','colour_id','product_image_server_url','is_default')->where('product_id', $id)->get();
        return response()->json($get_product_attachment);
    }

    public function storeProductAttachment(Request $request){
        try {
            $image = Str::slug($request->image, '-');
            if($request->hasFile('image')){
                $file = $request->file('image');
                $imageName = strtolower(uniqid()).'_'.$image.'.'.$file->getClientOriginalExtension();
                $destinationPath = str_replace('\\', '/', public_path().'/admin/images/product');
                $file->move($destinationPath,$imageName);
                $data=[
                   'product_id' => $request->image_product_id,
                   'colour_id' => $request->image_color_id,
                   'product_image_server_url'=>$imageName
                ];
            }
            $productAttachment = ProductAttachment::create($data);
            Toastr::success('Attachment Added Successfully', 'success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }   catch (\Throwable $th) {
            Toastr::success('Some error occured', 'warning', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }
}
