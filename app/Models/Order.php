<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','order_number','sub_total','delivery_charge','status','total_amount','first_name','last_name','country',
        'company_name', 'state', 'city', 'shipping_company_name', 'shipping_first_name', 'shipping_last_name', 'shipping_country', 'shipping_state',
        'shipping_city', 'shipping_address1', 'shipping_address2', 'shipping_post_code', 'different_shipping', 'currency', 'rate', 'comment',
        'post_code','address1','address2','phone','email','payment_method','payment_status','shipping_id','coupon'];

    public function cart_info(){
        return $this->hasMany('App\Models\Cart','order_id','id');
    }
    public static function getAllOrder($id){
        return Order::with('cart_info')->find($id);
    }
    public static function countActiveOrder(){
        $data=Order::count();
        if($data){
            return $data;
        }
        return 0;
    }
    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function shipping(){
        return $this->belongsTo(Shipping::class,'shipping_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

}
