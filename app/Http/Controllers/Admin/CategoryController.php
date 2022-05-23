<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Str;
class CategoryController extends Controller
{
    public function index(){
        $categories=Category::select('id','parent_id','name','category_image','status')->get();
        return view('admin.category.index',compact('categories'));
    }
    public function store(Request $request){
         //store function on category model
         if(Category::categoryAlredyUse($request->name)){
            Toastr::error('This Category already in used', 'success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
         }
         try {
            if($request->file('category_image')!=null){
                $image=$request->file('category_image');
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('admin/images/category'), $imageName);   
            } 
   
           $data=[
               'name' => $request->name,
               'slug' => Str::slug($request->name, '-'),
               'status'=>$request->status,
               'category_image'=> 'public/admin/images/category/' . $imageName,
           ];
           $category=Category::create($data);
           Toastr::success('Category Added Successfully', 'success', ["positionClass" => "toast-top-right"]);
           return redirect()->back();
         } catch (\Throwable $th) {
            Toastr::error('Something Went wrong', 'success', ["positionClass" => "toast-top-right"]);
           return redirect()->back();
         }
         
         
          
    }
    public function filterData($all_categories){
      
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
}
