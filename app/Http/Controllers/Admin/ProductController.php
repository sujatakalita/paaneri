<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\ProductAttachment;
use App\Models\Admin\ProductCategory;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Str;

class ProductController extends Controller
{
    public function index()
    {
      $products=Product::with(['productAttachment'=>function($query){
            $query->where('is_default',1);
        }])->orderBy('id', 'DESC')->get();

        return view('admin.product.index',compact('products'));
    }
    public function create()
    {
        $categories = Category::select('id', 'parent_id', 'name', 'category_image', 'status')->where('parent_id', null)->get();
        $sub_categories = Category::select('id', 'parent_id', 'name', 'category_image', 'status')->where('parent_id', '!=', null)->get();
        return view('admin.product.create', compact('categories', 'sub_categories'));
    }
    public function store(Request $request)
    {
        try {


            $data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
                'description' => $request->description,
                'is_available' => $request->is_available,
                'status' => 0,
                'video_url' => $request->video_url,
                'market_price' => 0,
                'selling_price' => $request->selling_price,
                'code' => $request->code,
                'total_product' => $request->total_product,
                'available_product'=>$request->total_product,
            ];
            $product = Product::create($data);
            if($request->file('product_images')!=null){
                foreach ($request->file('product_images') as $key => $product_images) {
                    $imageName = $product_images->getClientOriginalName();
                    $product_images->move(public_path('admin/images/product'), $imageName);

                    $imageUpload = new ProductAttachment();
                    $product_attachment=[
                      'product_id'=>  $product->id,
                      'product_image_server_url'=>'public/admin/images/product/' . $imageName,
                    ];
                   $productAttachment=ProductAttachment::create($product_attachment);
                }
             }
             foreach($request->categories as $key=>$category){
               $data=[
                   'product_id'=>$product->id,
                   'category_id'=>$category,
                   'type'=>1,
               ];
               $product_category=ProductCategory::create($data);
             }
             foreach($request->subcategories as $key=>$category){
                $data=[
                    'product_id'=>$product->id,
                    'category_id'=>$category,
                    'type'=>2,
                ];
                $product_category=ProductCategory::create($data);
              }
            return redirect()->back();
            Toastr::success('Product Added Successfully', 'success', ["positionClass" => "toast-top-right"]);
        } catch (\Throwable $th) {
          dd($th);
            Toastr::error('Something Went wrong', 'success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }
}

