<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\MegaMenu;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Str;
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
            $data = [
                'name' => $request->name,
                'slug' => Str::slug($request->name, '-'),
                'mega_menu_type'=>$request->mega_menu_type,
                'status' => $request->status,

            ];
            $category = MegaMenu::create($data);
            Toastr::success('MegaMenu Added Successfully', 'success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        } catch (\Throwable $th) {
            Toastr::error('Something Went wrong', 'success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }
}
