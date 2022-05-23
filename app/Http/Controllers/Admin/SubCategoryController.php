<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Str;
class SubCategoryController extends Controller
{
    public function index(){
        $categories=Category::select('id','parent_id','name','category_image','status')->where('parent_id',null)->get();
        $sub_categories=Category::select('id','parent_id','name','category_image','status')->where('parent_id','!=',null)->get();
        return view('admin.subcategory.index',compact('categories','sub_categories'));
    }
    public function store(Request $request){
       
        if(Category::categoryAlredyUse($request->name)){
            Toastr::error('This Category already in used', 'success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
         }
         try {
            $imageName=null;
            if($request->file('category_image')!=null){
                $image=$request->file('category_image');
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('admin/images/category'), $imageName);   
            } 
            if($imageName=null){
                $path=null;
            }else{
                $path='public/admin/images/category/' . $imageName;
            }
   
           $data=[
               'parent_id'=>$request->parent_id,
               'name' => $request->name,
               'slug' => Str::slug($request->name, '-'),
               'status'=>$request->status,
               'category_image'=> $path,
           ];
          
           $category=Category::create($data);
           Toastr::success('Category Added Successfully', 'success', ["positionClass" => "toast-top-right"]);
           return redirect()->back();
         } catch (\Throwable $th) {
             dd($th);
            Toastr::error('Something Went wrong', 'success', ["positionClass" => "toast-top-right"]);
           return redirect()->back();
         }

    }
}
