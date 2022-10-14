<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

use App\Models\Merchant;
use App\Models\Product;
use App\Models\Category;
use Helper;
use Lang;
use Auth;

class ProductController extends Controller
{
    /* Render Sell Page */
    public function sell()
    {
        $title = 'Seller Page';
        return view('user.seller')->withTitle($title);
    }

    /* Render Buyer Page */
    public function buy()
    {
        $title = 'Buyer Page';

        $products = Merchant::query();

        // Filter by Category
        if(!empty($_GET['cat']) && $_GET['cat']!='all'){
            $products->where('category', $_GET['cat']);
        }

        // Sort by
        if(!empty($_GET['sortBy'])){
            if($_GET['sortBy'] == 'title') {
                $products = $products->orderBy('name', 'ASC');
            }
            if($_GET['sortBy'] == 'price') {
                $products = $products->orderBy('value', 'ASC');
            }
            if($_GET['sortBy'] == 'price-desc') {
                $products = $products->orderBy('value', 'DESC');
            }
            if($_GET['sortBy'] == 'new') {
                $products = $products->orderBy('id', 'DESC');
            }
        }

        // Page Size
        if(!empty($_GET['show'])) {
            $products = $products->where('status', 'active')->paginate($_GET['show']);
        } else {
            $products = $products->where('status', 'active')->paginate(12);
        }

        Paginator::useBootstrap();

        $data['products'] = $products;
        return view('frontend.buyer', $data)->withTitle($title);
    }

    /* Render Product Detail Page */
    public function productDetail(Request $request)
    {
        $merchant_id = $request->slug;
        $product_detail = Merchant::find($merchant_id);
        $title = $product_detail->name;

        $contents = Product::where('merchant_id', $merchant_id)->where('status', 'active')->get();

        // get previous & next product
        $previous = Merchant::where('id', '<', $product_detail->id)->orderBy('id','desc')->first();
        $next = Merchant::where('id', '>', $product_detail->id)->orderBy('id','asc')->first();

        $data['product_detail'] = $product_detail;
        $data['featured'] = Merchant::where('id', '<>', $merchant_id)->where('status', 'active')->inRandomOrder()->limit(6)->get();
        $data['prev'] = $previous;
        $data['next'] = $next;
        $data['contents'] = $contents;

        return view('frontend.merchant', $data)->withTitle($title);
    }

    public function products(Request $request)
    {
        $title = Lang::get('title.products');
        $products = Product::query();

        // Filter by Category
        if(!empty($_GET['cat']) && $_GET['cat']!='all'){
            $slug = explode(',', $_GET['cat']);
            $cat_ids = Category::select('id')->whereIn('slug', $slug)->pluck('id')->toArray();
            $products->whereIn('cat_id', $cat_ids);
        }

        if(!empty($_GET['q']))
        {
            $products->where('title', 'LIKE', '%'.$_GET['q'].'%');
        }

        // Filter by Brand
        if(!empty($_GET['brand'])){
            $slugs = explode(',', $_GET['brand']);
            $brand_ids = Brand::select('id')->whereIn('slug', $slugs)->pluck('id')->toArray();
            $products->whereIn('brand_id', $brand_ids);
        }

        // Sort by
        if(!empty($_GET['sortBy'])){
            if($_GET['sortBy'] == 'title') {
                $products = $products->where('status', 'active')->orderBy('title', 'ASC');
            }
            if($_GET['sortBy'] == 'price') {
                $products = $products->orderBy('price', 'ASC');
            }
            if($_GET['sortBy'] == 'price-desc') {
                $products = $products->orderBy('price', 'DESC');
            }
            if($_GET['sortBy'] == 'new') {
                $products = $products->orderBy('id', 'DESC');
            }
        }

        // Filter by Price
        if(!empty($_GET['price'])){
            $price = explode('-', $_GET['price']);
            $products->whereBetween('price', $price);
        }

        $recent_products = Product::where('status','active')->orderBy('id','DESC')->limit(6)->get();

        // Page Size
        if(!empty($_GET['show'])) {
            $products = $products->where('status', 'active')->paginate($_GET['show']);
        } else {
            $products = $products->where('status', 'active')->paginate(12);
        }

        $data['brands'] = Brand::where('status', 'active')->orderBy('title','ASC')->get();
        $data['products'] = $products;
        $data['recent_products'] = $recent_products;

        return view('frontend.pages.products', $data)->withTitle($title);
    }

    /* Ajax Get Recommended Search */
    public function getRecommendSearch(Request $request)
    {
        try {
            $counts = Product::where('title', 'LIKE', '%'.$request->search.'%')->where('status', 'active')->count();
            $products = Product::with('brand')->with('cat_info')->where('title', 'LIKE', '%'.$request->search.'%')
                ->where('status', 'active')
                ->orderBy('id', 'desc')
                ->limit(8)
                ->get();

            if(count($products) > 0)
            {
                foreach($products as $list)
                {
                    $list->calc_price = Helper::getLocaleCurrency()->symbol.number_format(Helper::getPriceByCurrency(Helper::getProductPrice($list->id)), 2);
                }
            }

            $res = array(
                'status' => 'success',
                'data' => $products,
                'counts' => $counts
            );
            return response()->json($res);
        } catch (\Exception $e) {
            //throw $th;
        }
    }

    /* Get Product Quick View */
    public function getQuickView($id)
    {
        $product = Merchant::find($id);

        $data['product'] = $product;

        return view('frontend.components.product-quick-view', $data);
    }

    /* Ajax Get Pirce By changed Qauntity */
    public function getPriceByQuantity(Request $request)
    {
        $product = Product::find($request->product_id);
        if(empty($product))
        {
            $err = array(
                'status' => 'error',
                'message' => Lang::get('message.response.invalid_param')
            );
            return response()->json($err);
        }
        else
        {
            $cur_symbol = Helper::getLocaleCurrency()->symbol;
            $new_price  = Helper::getProductPrice($product->id) * $request->quantity;
            $old_price = $product->price * $request->quantity;

            $res = array(
                'status' => 'success',
                'old_price' => $cur_symbol.number_format(Helper::getPriceByCurrency($old_price), 2),
                'new_price' => $cur_symbol.number_format(Helper::getPriceByCurrency($new_price), 2),
                'discount' => $product->discount_option
            );
            return response()->json($res);
        }
    }
}
