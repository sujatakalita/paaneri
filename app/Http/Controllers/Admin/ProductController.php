<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\MegaMenu;
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
        $megamenus = MegaMenu::select('id', 'name')->where('status', 1)->get();
        $categories = Category::select('id', 'parent_id', 'name', 'category_image', 'status')->where('parent_id', null)->get();
        $sub_categories = Category::select('id', 'parent_id', 'name', 'category_image', 'status')->where('parent_id', '!=', null)->get();
        return view('admin.product.create', compact('categories', 'sub_categories','megamenus'));
    }
    public function store(Request $request)
    {
        try {
            $data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
                'code' => $request->code,
                'video_url' => $request->video_url,
                'description' => $request->description,
                'weight' => $request->weight,
                'market_price' => $request->market_price,
                'selling_price' => $request->selling_price,
                'total_product' => $request->total_product,
                'is_available' => $request->is_available,
                'discount' => $request->discount,
                'discount_rate' => $request->discount_rate,
                'available_product' => $request->total_product
            ];
            $product = Product::create($data);
            // if($request->file('product_images')!=null){
            //     foreach ($request->file('product_images') as $key => $product_images) {
            //         $imageName = $product_images->getClientOriginalName();
            //         $product_images->move(public_path('admin/images/product'), $imageName);
            //         $imageUpload = new ProductAttachment();
            //         $product_attachment=[
            //           'product_id'=>  $product->id,
            //           'product_image_server_url'=>'public/admin/images/product/' . $imageName,
            //         ];
            //        $productAttachment=ProductAttachment::create($product_attachment);
            //     }
            //  }
            foreach($request->megamenu as $key=>$megamenu){
                $data=[
                    'product_id'=>$product->id,
                    'category_id'=>$megamenu,
                    'type'=>3,
                ];
                $product_category=ProductCategory::create($data);
            }
            foreach($request->categories as $key=>$category){
                $data=[
                    'product_id'=>$product->id,
                    'category_id'=>$category,
                    'type'=>1,
                ];
                $product_category=ProductCategory::create($data);
            }
            foreach($request->subCategories as $key=>$category){
                $data=[
                    'product_id'=>$product->id,
                    'category_id'=>$category,
                    'type'=>2,
                ];
                $product_category=ProductCategory::create($data);
            }
            Toastr::success('Product Added Successfully', 'success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        } catch (\Throwable $th) {
          dd($th);
            Toastr::error('Something Went wrong', 'success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }
}

