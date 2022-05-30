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

class UserProductController extends Controller
{
    public function index(Request $request)
    {
        $mega_menus = MegaMenu::with('megaMenuCategory')->get();

        $products = Product::query();

        $products = $this->filter($products)->with(['productColor','productSize','productAttachment' => function ($query) {
            $query->where('is_default', 1);
        }])->orderBy('id', 'DESC')->paginate(50);

        return view('user.product', compact('products'));
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
            ])->where('slug', $product_slug)->first();

            $reviews = ProductReview::with('product','user')->where([['status',1],['is_approved',1]])->get();

            return view('user.product.productdetails', compact('product','reviews'));
        } catch (\Throwable $th) {
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
}
