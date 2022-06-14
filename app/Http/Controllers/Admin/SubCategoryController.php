<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\MegaMenu;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use DB,Crypt,Validator,Str,Redirect,Image, Session;

class SubCategoryController extends Controller
{
    public function index(){
        $categories=Category::select('id','parent_id','name','category_image','status')->where('parent_id',null)->get();
        $sub_categories=Category::select('id','parent_id','name','category_image','status','slug','seoTitle','seoDescription','seoKeywords','canonicalUrl')->where('parent_id','!=',null)->get();
        $mega_menu=MegaMenu::select('id','name')->where('status', 1)->get();
        return view('admin.subcategory.index',compact('categories','sub_categories', 'mega_menu'));
    }
    public function store(Request $request){
       
        if(Category::categoryAlredyUse($request->name)){
            Toastr::error('This Category already in used', 'success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
         }
         try {
            $sub_category_img_slug = Str::slug($request->category_image, '-');
            if($request->hasFile('category_image')){
                $file = $request->file('category_image');
                $imageName = strtolower(uniqid()).'_'.$sub_category_img_slug.'.'.$file->getClientOriginalExtension();
                $destinationPath = str_replace('\\', '/', public_path().'/admin/category');
                $file->move($destinationPath,$imageName);
                $data=[
                    'parent_id'=>$request->parent_id,
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
            Toastr::success(' Sub Category Added Successfully', 'success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
         } catch (\Throwable $th) {
             dd($th);
            Toastr::error('Something Went wrong', 'success', ["positionClass" => "toast-top-right"]);
           return redirect()->back();
         }

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

    public function getCategory($id)
    {
        $get_category['data'] = Category::join('mega_menu_categories', 'mega_menu_categories.category_id', '=', 'categories.id')->where('mega_menu_categories.mega_menu_id', $id)->get();
        return response()->json($get_category);
    }

    public function getOne($id)
    {
        $get_sub_category['data'] = Category::select('id','name','slug','category_image','seoTitle','status','seoDescription','seoKeywords','canonicalUrl')->where('id', $id)->first();
        return response()->json($get_sub_category);
    }

    public function edit(Request $request)
    {
        try {
            $category = Category::where('id',$request->edit_id)->first();
            if($category){
                $sub_category_img_slug = Str::slug($request->category_image, '-');
                if( $request->hasFile('category_image')){
                    $file = $request->file('category_image');
                    $imageName = strtolower(uniqid()).'_'.$sub_category_img_slug.'.'.$file->getClientOriginalExtension();
                    $destinationPath=str_replace('\\', '/', public_path().'/admin/category');
                    $file->move($destinationPath,$imageName);
                    $data = [
                        'parent_id'=>$request->edit_parent_id,
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
