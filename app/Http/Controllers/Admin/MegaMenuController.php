<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\MegaMenu;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use DB,Crypt,Validator,Str,Redirect,Image, Session;

class MegaMenuController extends Controller
{
    public function index()
    {
        $mega_menus=MegaMenu::getAll();
        return view('admin.megamenu.index',compact('mega_menus'));
    }
    public function store(Request $request)
    {
        try {
            $megamenu_img_slug = Str::slug($request->image, '-');
            if( $request->hasFile('image')){
                $file = $request->file('image');
                $imageName = strtolower(uniqid()).'_'.$megamenu_img_slug.'.'.$file->getClientOriginalExtension();
                $destinationPath=str_replace('\\', '/', public_path().'/admin/category');
                $file->move($destinationPath,$imageName);
                $data = [
                    'name' => $request->name,
                    'slug' => Str::slug($request->name, '-'),
                    'mega_menu_type'=>$request->mega_menu_type,
                    'image' => $imageName,
                    'status' => $request->status,
                ];
            }
            $category = MegaMenu::create($data);
            Toastr::success('MegaMenu Added Successfully', 'success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        } catch (\Throwable $th) {
            Toastr::error('Something Went wrong', 'success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }

    public function edit(Request $request)
    {
        try {
            $mega_menu = MegaMenu::where('id',$request->id)->first();
            if($mega_menu){
                $megamenu_img_slug = Str::slug($request->image, '-');
                if( $request->hasFile('image')){
                    $file = $request->file('image');
                    $imageName = strtolower(uniqid()).'_'.$megamenu_img_slug.'.'.$file->getClientOriginalExtension();
                    $destinationPath=str_replace('\\', '/', public_path().'/admin/category');
                    $file->move($destinationPath,$imageName);
                    $data = [
                        'name' => $request->name,
                        'slug' => Str::slug($request->name, '-'),
                        'mega_menu_type'=>$request->mega_menu_type,
                        'image' => $imageName,
                        'status' => $request->status,
                    ];
                }
                $mega_menu->update($data);
                Toastr::success('MegaMenu updated Successfully', 'success', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            Toastr::error('Something Went wrong', 'success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }

    public function delete(Request $request)
    {
        try{
            $megamenu = MegaMenu::where('id',$request->id)->first();
            $data = [
                'deleted_at'=>date("Y-m-d H:i:s")
            ];
            $megamenu->update($data);
            if($megamenu){
                echo "1";
            }
        } catch (\Throwable $th) {
            echo "2";
        }
    }

    public function getOne($id)
    {
        $get_megamenu['data'] = MegaMenu::select('id','name','slug','image','mega_menu_type','status')->where('id', $id)->first();
        return response()->json($get_megamenu);
    }
}
