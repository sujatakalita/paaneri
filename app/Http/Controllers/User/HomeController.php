<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\MegaMenu;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\ProductCategory;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mega_menus = MegaMenu::with('megaMenuCategory')->get();
        foreach($mega_menus as $key=>$mega_menu) {
            if ($mega_menu->megaMenuCategory->count()>0) {
                foreach($mega_menu->megaMenuCategory as $key=>$mega_menu_category) {
                    $cats = Category::with('subCategory')->where([['status',1],['slug','occasion']])->get();
                    $cats_styles = Category::with('subCategory')->where([['status',1],['slug','style']])->skip(10)->take(5)->get();
                    $cats_colors = Category::with('subCategory')->where([['status',1],['slug','colors']])->get();
                }
            }
        }
        $best_sellers = Product::with('productAttachment')->where([['discount',1],['status',1]])->orderBy('id', 'DESC')->get();
        $mega_menu_id = MegaMenu::with('megaMenuCategory')->where([['status',1],['slug','men']])->first();

        $best_for_men = ProductCategory::with('product')->where([['type',3],['category_id',$mega_menu_id->id]])->orderBy('id', 'DESC')->get();
                    $cats_styles = Category::with('subCategory')->where([['status',1],['slug','style']])->get();
        return view('welcome',compact('cats','best_sellers','best_for_men','cats_styles','cats_colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
