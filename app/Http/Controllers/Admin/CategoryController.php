<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB,Crypt,Validator,Str,Redirect,Image, Session;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::select('id','name','slug','category_image','status','seoTitle','seoDescription','seoKeywords','canonicalUrl')->where('parent_id', NULL)->get();
        return view('admin.category.index',compact('categories'));
    }
    public function store(Request $request){
         //store function on category model
         if(Category::categoryAlredyUse($request->name)){
            Toastr::error('This Category already in used', 'success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
         }
         try {
            $category_img_slug = Str::slug($request->category_image, '-');
            if($request->hasFile('category_image')){
                $file = $request->file('category_image');
                $imageName = strtolower(uniqid()).'_'.$category_img_slug.'.'.$file->getClientOriginalExtension();
                $destinationPath = str_replace('\\', '/', public_path().'/admin/category');
                $file->move($destinationPath,$imageName);
                $data=[
                   'name' => $request->name,
                   'slug' => Str::slug($request->name, '-'),
                   'status'=>$request->status,
                   'category_image'=> $imageName,
                   'seoTitle' => $request->seoTitle,
                   'seoDescription' => $request->seoDescription,
                   'seoKeywords' => $request->seoKeywords,
                   'canonicalUrl' => $request->canonicalUrl
                ];
            }
            $category=Category::create($data);
            Toastr::success('Category Added Successfully', 'success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
         } catch (\Throwable $th) {
            Toastr::error('Something Went wrong', 'success', ["positionClass" => "toast-top-right"]);
           return redirect()->back();
         }
    }

    public function SubcategoryFilter($all_categories){
        if($all_categories==''){
            $categories =null; 
            $sub_categories=null;
        }else{
            $categories = explode(',', $all_categories);
            $sub_categories=Category::whereIn('parent_id',$categories)->select('id','name')->get();
        }
        $data=[
            'category'=>$categories,
            'sub_categories'=>$sub_categories,
        ];
       return response()->json($data);
    }

    public function filterData($all_megamenu){
        if($all_megamenu==''){
            $megamenu = null;
            $categories = null;
        }else{
            $megamenu = explode(',', $all_megamenu);
            $categories = Category::join('mega_menu_categories', 'mega_menu_categories.category_id', '=', 'categories.id')->whereIn('mega_menu_categories.mega_menu_id', $megamenu)->select('categories.id','categories.name')->get();
        }
        $data=[
            'megamenu'=>$megamenu,
            'category'=>$categories
        ];
       return response()->json($data);
    }

    public function delete(Request $request)
    {
        try{
            $category = Category::where('id',$request->id)->first();
            $data = [
                'deleted_at'=>date("Y-m-d H:i:s")
            ];
            $category->update($data);
            if($category){
                echo "1";
            }
        } catch (\Throwable $th) {
            echo "2";
        }
    }

    public function getOne($id)
    {
        $get_category['data'] = Category::select('id','name','slug','category_image','seoTitle','status','seoDescription','seoKeywords','canonicalUrl')->where('id', $id)->first();
        return response()->json($get_category);
    }


    public function edit(Request $request)
    {
        try {
            $category = Category::where('id',$request->id)->first();
            if($category){
                $category_img_slug = Str::slug($request->category_image, '-');
                if( $request->hasFile('category_image')){
                    $file = $request->file('category_image');
                    $imageName = strtolower(uniqid()).'_'.$category_img_slug.'.'.$file->getClientOriginalExtension();
                    $destinationPath=str_replace('\\', '/', public_path().'/admin/category');
                    $file->move($destinationPath,$imageName);
                    $data = [
                        'name' => $request->name,
                        'slug' => Str::slug($request->name, '-'),
                        'status'=>$request->status,
                        'category_image'=> $imageName,
                        'seoTitle' => $request->seoTitle,
                        'seoDescription' => $request->seoDescription,
                        'seoKeywords' => $request->seoKeywords,
                        'canonicalUrl' => $request->canonicalUrl
                    ];
                }
                $category->update($data);
                Toastr::success('Category updated Successfully', 'success', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            Toastr::error('Something Went wrong', 'success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }
}
