<?php

use App\User;
use App\Models\Language;
use App\Models\Message;
use App\Models\Category;
use App\Models\PostTag;
use App\Models\Brand;
use App\Models\PostCategory;
use App\Models\Order;
use App\Models\Wishlist;
use App\Models\Shipping;
use App\Models\Cart;
use App\Models\Partner;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\Currency;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Helper {

    public static function messageList()
    {
        return Message::whereNull('read_at')->orderBy('created_at', 'desc')->get();
    }

    public static function getAllCategories()
    {
        $category_data = Category::where('status', 'active')->get();
        return $category_data;
    }

    public static function productCategoryList($option='all'){
        if($option='all'){
            return Category::orderBy('id','DESC')->get();
        }
        return Category::has('products')->orderBy('id','DESC')->get();
    }

    public static function postTagList($option='all'){
        if($option='all'){
            return PostTag::orderBy('id','desc')->get();
        }
        return PostTag::has('posts')->orderBy('id','desc')->get();
    }

    public static function postCategoryList($option="all"){
        if($option='all'){
            return PostCategory::orderBy('id','DESC')->get();
        }
        return PostCategory::has('posts')->orderBy('id','DESC')->get();
    }

    // Cart Count
    public static function cartCount($user_id=''){

        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            return Cart::where('user_id',$user_id)->sum('quantity');
        }
        else{
            return 0;
        }
    }

    // relationship cart with product
    public function product(){
        return $this->hasOne('App\Models\Product','id','product_id');
    }

    public static function getAllProductFromCart($user_id=''){
        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            return Cart::with('product')->where('user_id',$user_id)->where('order_id',null)->get();
        }
        else{
            return 0;
        }
    }

    // Total amount cart
    public static function totalCartPrice($user_id=''){
        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            return Cart::where('user_id',$user_id)->sum('amount');
        }
        else{
            return 0;
        }
    }

    // Wishlist Count
    public static function wishlistCount($user_id=''){

        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            return Wishlist::where('user_id',$user_id)->where('cart_id',null)->sum('quantity');
        }
        else{
            return 0;
        }
    }
    public static function getAllProductFromWishlist($user_id=''){
        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            return Wishlist::with('product')->where('user_id',$user_id)->where('cart_id',null)->get();
        }
        else{
            return 0;
        }
    }
    public static function totalWishlistPrice($user_id=''){
        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            return Wishlist::where('user_id',$user_id)->where('cart_id',null)->sum('amount');
        }
        else{
            return 0;
        }
    }

    // Total price with shipping and coupon
    public static function grandPrice($id,$user_id){
        $order=Order::find($id);
        dd($id);
        if($order){
            $shipping_price=(float)$order->shipping->price;
            $order_price=self::orderPrice($id,$user_id);
            return number_format((float)($order_price+$shipping_price),2,'.','');
        }else{
            return 0;
        }
    }


    // Admin home
    public static function earningPerMonth(){
        $month_data=Order::where('status','delivered')->get();
        // return $month_data;
        $price=0;
        foreach($month_data as $data){
            $price = $data->cart_info->sum('price');
        }
        return number_format((float)($price),2,'.','');
    }

    public static function shipping(){
        return Shipping::orderBy('id','DESC')->get();
    }

    // Get Setting Data
    public static function getCommonSetting($key)
    {
        $result = 'No Data';
        $setting_data = DB::table('settings')->where('setting_key',$key)->get();
        if(count($setting_data)>0) $result = $setting_data[0]->setting_value;
        return $result;
    }

    // Get Partner List
    public static function getPartnerList()
    {
        $result = Partner::where('status', 'active')->get();
        return $result;
    }

    // Get Product Review
    public static function getProductReview($product_id)
    {
        $products = ProductReview::where('product_id', $product_id)->get();
        $result = 0;
        if(count($products)>0){
            foreach($products as $list)
            {
                $result += $list->rate;
            }
            $result = $result/count($products);
        }
        return $result/5*100;
    }

    // Get Category List
    public static function getCategoryList()
    {
        $menu = Category::getAllParentWithChild();
        return $menu;
    }

    // Get Product Category
    public static function getProductCategory($cat_id)
    {
        $category = Category::find($cat_id);
        return $category;
    }

    // Get Cart Products
    public static function getCart()
    {
        if(Auth::check()){
            $cart = Cart::with('merchant')->where('user_id', auth()->user()->id)->get();
            $total = 0;

            if(count($cart) > 0){
                foreach($cart as $list)
            {
                $list->price = $list->quantity * $list->merchant->value;
                $total += $list->price;
            }

            }


            $data['cart'] = $cart;
            $data['subtotal'] = $total;
            $data['cart_count'] = count($cart);
        } else {
            $cart  = Session::get('carts');

            $total = 0;
            if(!empty($cart)){
            foreach($cart as $list)
            {
                $list->price = 1 * $list->value;
                $total += $list->price;
            }
            $data['cart_count'] = count($cart);
        } else {
            $data['cart_count'] = 0;
        }


            $data['cart'] = $cart;
            $data['subtotal'] = $total;
        }

        return $data;
    }

    // Get Product by ID
    public static function getProductById($id)
    {
        $product = Product::find($id);
        return $product;
    }

    // Check if product in wishlist
    public static function checkIfWishlist($product_id)
    {
        $res = Wishlist::where('user_id', auth()->user()->id)->where('product_id', $product_id)->get();
        if(count($res)>0) return true;
        else return false;
    }

    // Get Language List
    public static function getLanguages()
    {
        $data = Language::where('status', 'active')->get();
        return $data;
    }

    // Get Current Language
    public static function getLocaleLang($code)
    {
        $data = Language::where('code', $code)->first();
        return $data;
    }

    // Get Currency List
    public static function getCurrencies()
    {
        $data = Currency::where('status', 'active')->get();
        return $data;
    }

    // Get Current Currency
    public static function getLocaleCurrency()
    {
        $cur = Session::get('currency');
        if($cur == '') $cur = 'CHF';
        $data = Currency::where('name', $cur)->first();
        return $data;
    }

    /* Get Currency Data */
    public static function getCurSymbol($cur)
    {
        $data = Currency::where('name', $cur)->first();
        if(empty($data)) return 'N/A';
        return $data->symbol;
    }

    // Get Calculated Price by currency
    public static function getPriceByCurrency($price)
    {
        $cur = Session::get('currency');
        if($cur == '') $cur = 'CHF';
        $currency_data = Currency::where('name', $cur)->first();
        $result = $price * $currency_data->rate;

        return $result;
    }

    /* Get converted CHF currency */
    public static function getCHF($price, $curr)
    {
        $curr_data = Currency::where('name', $curr)->first();
        if(empty($curr_data)) return 0;
        else return $result = $price / $curr_data->rate;
    }

    // Get Random Status
    public static function getRandomStatus()
    {
        $stateNo =  rand(0, 7);
        $states = [
            'success',
            'primary',
            'danger',
            'success',
            'warning',
            'dark',
            'primary',
            'info'
        ];
        $state = $states[$stateNo];
        return $state;
    }

    // Get Time Elapased
    public static function getTimeAgo($time)
    {
        $time = strtotime($time);
        $time = time() - $time;
        $time = ($time<1)? 1 : $time;
        $tokens = array (
            31536000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hour',
            60 => 'minute',
            1 => 'second'
        );

        foreach ($tokens as $unit => $text) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
        }
    }

    /* Get Country Name */
    public static function getCountryNameById($id) {
        $data = DB::table('countries')->find($id);
        if(empty($data)) return 'N/A';
        else return $data->name;
    }

    /* Get Country */
    public static function getCountryById($id) {
        $data = DB::table('countries')->find($id);
        if(empty($data)) return 'N/A';
        else return $data;
    }

    /* Get State Name */
    public static function getStateNameById($id) {
        $data = DB::table('states')->find($id);
        if(empty($data)) return 'N/A';
        else return $data->name;
    }

    /* Get Cart Item Price */
    public static function getCartItemPrice($id)
    {
        // varialble init
        $data = Cart::with('product')->find($id);
        $rslt = 0.0;
        // check if valid item id
        if(empty($data)) return $rslt;
        // calculate price
        $base_price = $data->product->price;
        if($data->product->discount_option == 2) { // percent discount
            $rslt = $base_price * (100 - $data->product->discount) / 100;
        } elseif($data->product->discount_option == 3) { // fixed discount
            $rslt = $data->product->discounted_price;
        } else {
            $rslt = $base_price;
        }

        if($data->product->template == 'lens'){
            $sub_quantity = $data->quantity_r;
            if($data->eye_diff == 'true') $sub_quantity += $data->quantity_l;
            $rslt *= $sub_quantity;
        }


        return $rslt;
    }

    /* Get Product Price */
    public static function getProductPrice($id)
    {
        // varialble init
        $data = Product::find($id);
        $rslt = 0.0;
        // check if valid item id
        if(empty($data)) return $rslt;
        // calculate price
        $base_price = $data->price;
        if($data->discount_option == 2) { // percent discount
            $rslt = $base_price * (100 - $data->discount) / 100;
        } elseif($data->discount_option == 3) { // fixed discount
            $rslt = $data->discounted_price;
        } else {
            $rslt = $base_price;
        }

        return $rslt;
    }

    /* Get Coupon discount */
    public static function getCouponDiscount($subtotal)
    {
        $coupon_data = Session::get('coupon');
        if(empty($coupon_data)) return 0;
        else {
            if($coupon_data['type'] == 'percent') return $subtotal * $coupon_data['value'] / 100;
            else return $coupon_data['value'];
        }
    }

    /* Detect location by Currency & Language */
    public static function getLocation()
    {
        $country_id = 214; // Switzerland

        $cur = Session::get('currency');
        $locale = Session::get('locale');

        if($cur == '') $cur = 'CHF';
        if($locale == '') $locale = 'de';

        if($locale == 'de'){
            if($cur == 'CHF') $country_id = 214; // Switzerland
            if($cur == 'EUR') $country_id = 82; // Germany
        } elseif($locale == 'fr') {
            $country_id = 75;                   // France
        } elseif($locale == 'it') {
            $country_id = 107;                   // Italy
        } else {
            $country_id = 233;                   // United States
        }

        return $country_id;
    }

    public static function genID($id)
    {
        $result = '';
        for( $i = 0 ; $i < 6 - strlen($id) ; $i++ ) $result .= '0';
        $result .= $id;

        return $result;
    }

    public static function getCustomerInfo($id)
    {
        return User::find($id);
    }

    public static function getBrandInfo($id)
    {
        return Brand::find($id);
    }
}

?>
