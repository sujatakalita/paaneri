<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\HomePageSlider;
use App\Models\Admin\MegaMenu;
use App\Models\Admin\Product;
use App\Models\Admin\ProductAttachment;
use App\Models\Admin\productSize;
use App\Models\User\ProductReview;
use Illuminate\Http\Request;
use \willvincent\Rateable\Rating;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Admin\productMeasurmentOptions;
use App\Models\Admin\Category;
use App\Models\Admin\ProductCategory;
use Auth,Crypt;


class UserProductController extends Controller
{
    public function index(Request $request)
    {
        $mega_menus = MegaMenu::with('megaMenuCategory')->get();

        $products = Product::query();

        $products = $this->filter($products)->with(['productColor','productSize','productAttachment' => function ($query) {
            $query->where('is_default', 1);
        }])->orderBy('id', 'DESC')->paginate(50);

        return view('user.product.index', compact('products','mega_menus'));
    }
    
    public function viewDetails($product_slug)
    {
        
        try {
            $product = Product::with([
                'productColor',
                'productAttachment' => function ($query) {
                    $query->where('is_default', 1);
                },
                'productSize' => function ($query) {
                    $query->where('is_active', 1);
                },
                'productMeasurment' => function ($query) {
                    $query->with('productMeasurmentOptions')->where('status', 1);
                }
            ])->where('slug',$product_slug)->first();

            $tot_review = Rating::where([['rateable_id',$product->id],['status',1]])->count();

            $reviews = ProductReview::with('product','user')->where([['status',1],['is_approved',1]])->get();
            
            // dd($tot_review);
            
            return view('user.product.productdetails', compact('product','reviews','tot_review'));
        } catch (\Throwable $th) {
            dd($th);
            //throw $th;
        }
    }
    public function productByColour(Request $request)
    {
        try {
            $product_id = $request['product_id'];
            $colour_id = $request['colour_id'];
            $poduct_attachements = ProductAttachment::where('product_id', $product_id)->where('colour_id', $colour_id)->get();
            $data = [
                'code' => 200,
                'attachements' => $poduct_attachements,
            ];
            return response()->json($data);
        } catch (\Throwable $th) {
            $data = [
                'code' => 400,
            ];
            return response()->json($data);
        }
    }
    public function filterProduct($filter)
    {

        $products = Product::with(['productColor', 'productSize', 'productAttachment' => function ($query) {
            $query->where('is_default', 1);
        }])->orderBy('id', 'DESC')->get();

        $total_products = $products->count();

        $data = [
            'all_products' => $products,
            'total_products' => $total_products,
        ];
        return response()->json($data);
    }
    public function filter($products)
    {

        $products->when(request("categories"), function ($query) {

            $query->whereHas("productCategory", function ($query) {
                $query->WhereIn('category_id', request("categories"));
            });
        });
        $products->when(request("colours"), function ($query) {
            $query->whereHas("productColor", function ($query) {
                $query->WhereIn('colour', request("colours"));
            });
        });
        $products->when(request("price_range"), function ($query) {

            $price = explode(";", request("price_range"));
            $query->whereBetween('market_price', [$price[0], $price[1]]);
        });
        $products->when(request("product_delivery_status"), function ($query) {

            $query->WhereIn('product_delivery_status', request("product_delivery_status"));
        });
        return $products;
    }

    public function ratingStore(Request $request)
    {
        $blog_id = Crypt::encrypt($request->product_id);
        $ip_addres = $request->ip();
        // dd(Location::get($ip_addres));
        // dd($request->id);

        $existingBlogRating = Rating::where([['ip_address',$ip_addres],['rateable_id',$request->product_id],['status',1]])->first();
        
        request()->validate(['rate' => 'required']);

        if ($existingBlogRating) {
            Rating::where([['ip_address',$ip_addres],['rateable_id',$request->product_id],['status',1]])->update(['rating' => $request->rate]);
        }else{
            $post = Product::find($request->product_id);
            $rating = new Rating();
            $rating->rating = $request->rate;
            $rating->ip_address = $ip_addres;
            $rating->user_id = Auth::user()->id;
            $post->ratings()->save($rating);
        }


        Toastr::success('Your rating saved successfully', 'success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();

    }

    public function productByCategory(Request $request, $category_slug, $mega_menu)
    {
        $category_id = Category::where('slug',$request->category_slug)->first()->id ;
        $mega_menu_id = MegaMenu::where('slug',$request->mega_menu)->first()->id ;
        $mega_menus = MegaMenu::with('megaMenuCategory')->get();

        $all_products_by_cat = ProductCategory::with('product')->where([['category_id',$category_id],['type',2]])->orderBy('id', 'DESC')->paginate(50);
        // dd($all_products_by_cat);
        return view('user.product.by_category',compact('all_products_by_cat','mega_menus'));
    }

    public function sale(Request $request)
    {
        $mega_menus = MegaMenu::with('megaMenuCategory')->get();

        $products = Product::where([['discount',1],['status',1]])->orderBy('id', 'DESC')->paginate(50);
       
        return view('user.product.sale',compact('products','mega_menus'));
    }

    public function men(Request $request, $mega_menu_men_slug)
    {
        $mega_menu_id = MegaMenu::with('megaMenuCategory')->where([['status',1],['slug',$mega_menu_men_slug]])->first();

        $mega_menus = MegaMenu::with('megaMenuCategory')->get();

        // foreach($mega_menu->megaMenuCategory as $key=>$mega_menu_category) {
        //     $products_cat = ProductCategory::with('product')->where([['category_id',$mega_menu_category->category_id],['type',1]])->orderBy('id', 'DESC')->get();
        // }

        // dd($mega_menu_id);

        $products = ProductCategory::with('product')->where([['type',3],['category_id',$mega_menu_id->id]])->orderBy('id', 'DESC')->paginate(50);
            
        return view('user.product.men',compact('products','mega_menus'));
    }

    public function bridal(Request $request, $mega_menu_bridal_slug)
    {
        $mega_menus = MegaMenu::with('megaMenuCategory')->get();

        $mega_menu_id = MegaMenu::with('megaMenuCategory')->where([['status',1],['slug',$mega_menu_bridal_slug]])->first();


        $products = ProductCategory::with('product')->where([['type',3],['category_id',$mega_menu_id->id]])->orderBy('id', 'DESC')->paginate(50);
        
        // dd($products);

        return view('user.product.bridal',compact('products','mega_menus'));
    }

    public function accessories(Request $request, $mega_menu_accessories_slug)
    {
        $mega_menus = MegaMenu::with('megaMenuCategory')->get();
        
        $mega_menu_id = MegaMenu::with('megaMenuCategory')->where([['status',1],['slug',$mega_menu_accessories_slug]])->first();


        $products = ProductCategory::with('product')->where([['type',3],['category_id',$mega_menu_id->id]])->orderBy('id', 'DESC')->paginate(50);
        
        return view('user.product.accessories',compact('products','mega_menus'));
    }

    public function occasion(Request $request, $scat_slug)
    {
        $cat_id = Category::where([['status',1],['slug',$scat_slug]])->first();

        $mega_menus = MegaMenu::with('megaMenuCategory')->get();

        $products = ProductCategory::with('product')->where([['type',2],['category_id',$cat_id->id]])->orderBy('id', 'DESC')->paginate(50);
            
        return view('user.product.shop_by_occasion',compact('products','mega_menus'));
    }

    public function style(Request $request, $scat_slug)
    {
        $cat_id = Category::where([['status',1],['slug',$scat_slug]])->first();

        $mega_menus = MegaMenu::with('megaMenuCategory')->get();

        $products = ProductCategory::with('product')->where([['type',2],['category_id',$cat_id->id]])->orderBy('id', 'DESC')->paginate(50);
            
        return view('user.product.shop_by_style',compact('products','mega_menus'));
    }

    public function color(Request $request, $scat_slug)
    {
        $cat_id = Category::where([['status',1],['slug',$scat_slug]])->first();

        $mega_menus = MegaMenu::with('megaMenuCategory')->get();

        $products = ProductCategory::with('product')->where([['type',2],['category_id',$cat_id->id]])->orderBy('id', 'DESC')->paginate(50);
            
        return view('user.product.shop_by_color',compact('products','mega_menus'));
    }
}
