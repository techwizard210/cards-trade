<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\DeliveryNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PDF;
use Lang;
use DB;
use Helper;

class OrderController extends Controller
{
    // Render Admin Orders List Page
    public function index()
    {
        $title = Lang::get('title.orders');
        $data['data'] = Order::with('user')->orderBy('created_at', 'desc')->get();

        // $data['data'] = Brand::all();
        return view('backend.pages.order.index', $data)->withTitle($title);
    }

    // Render Admin Order Detail Page
    public function detail($id)
    {
        $data['content'] = Order::with('user')->find($id);
        if(empty($data['content'])) abort(404);
        $title = Lang::get('label.brand').' - '.$data['content']->order_number;
        $data['order_products'] = DB::table('order_products')->leftJoin('products', 'products.id', 'order_products.product_id')->where('order_id', $data['content']->id)->get();
        return view('backend.pages.order.detail', $data)->withTitle($title);
    }

    /* Ajax Delete Orders */
    public function orderDelete(Request $request)
    {
        try {
            $ids = $request->ids;

            foreach($ids as $list)
            {
                Order::find($list)->delete();
            }

            $success_array = array(
                'status' => 'success',
                'message' => Lang::get('message.response.delete_success'),
            );

            return response()->json($success_array);

        } catch (\Exception $e) {

            $error = $e->getMessage();

            $error_array = array(
                'status' => 'error',
                'message' => $error
            );

            return response()->json($error_array);
        }
    }

    /* Generate Delivery Note */
    private function genDeliveryPDF($delivery_id)
    {
        try {

            $data = array();
            $delivery = DeliveryNote::find($delivery_id);
            $order_data = Order::find($delivery->order_id);
            $user_data = User::find($order_data->user_id);
            $products = OrderProduct::with('product')->where('order_id', $order_data->id)->get();

            // $delivery->order_id = $order_id;
            // $delivery->bank_user = Helper::getCommonSetting('bank_user');
            // $delivery->bank_zip = Helper::getCommonSetting('company_post_code');
            // $delivery->bank_city = Helper::getCommonSetting('company_city');
            // $delivery->bank_street = Helper::getCommonSetting('company_address');
            // $delivery->bank_phone = Helper::getCommonSetting('company_post_code');
            // $delivery->bank_email = Helper::getCommonSetting('company_contact_phone');
            // $delivery->bank_tax = Helper::getCommonSetting('bank_tax');
            // $delivery->bank_country = Helper::getCommonSetting('company_country');

            // $delivery->save();

            $data['content'] = $delivery;
            $data['user'] = $user_data;
            $data['products'] = $products;
            // $data['bank'] = $bank_data;
            $data['order'] = $order_data;
            $data['lang'] = $user_data->language;

            $filename = "DN_".Helper::genID($delivery->id).".pdf";

            $pdf = PDF::loadView('pdf.delivery-note', $data)->save(public_path().'/storage/delivery/'.$filename);

            $delivery->path = $filename;
            $delivery->save();

            return TRUE;

        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }



    /* Generate Delivery Note */
    private function genDeliveryNote($order_id)
    {
        try {

            $delivery = new DeliveryNote;

            $delivery->order_id = $order_id;
            $delivery->bank_user = Helper::getCommonSetting('bank_user');
            $delivery->bank_zip = Helper::getCommonSetting('company_post_code');
            $delivery->bank_city = Helper::getCommonSetting('company_city');
            $delivery->bank_street = Helper::getCommonSetting('company_address');
            $delivery->bank_phone = Helper::getCommonSetting('company_contact_phone');
            $delivery->bank_email = Helper::getCommonSetting('company_contact_email');
            $delivery->bank_tax = Helper::getCommonSetting('bank_tax');
            $delivery->bank_country = Helper::getCommonSetting('company_country');

            $delivery->save();

            return $this->genDeliveryPDF($delivery->id);

        } catch (\Exception $e) {
            return FALSE;
        }
    }

    /* Ajax Update Order Status */
    public function orderUpdateStatus(Request $request)
    {
        try {
            $order = Order::find($request->id);

            $order->status = $request->status;
            if($request->status == 'delivered')
            {
                if($this->genDeliveryNote($order->id)){
                    $order->save();
                } else {
                    $success_array = array(
                        'status' => 'error',
                        'message' => 'Delivery Note Generation Failed',
                    );
                    return response()->json($success_array);
                }
            } else {
                $order->save();
            }

            $success_array = array(
                'status' => 'success',
                'message' => Lang::get('message.response.update_success'),
            );

            return response()->json($success_array);

        } catch (\Exception $e) {

            $error = $e->getMessage();
            $error_array = array(
                'status' => 'error',
                'message' => $error
            );

            return response()->json($error_array);
        }
    }

    /* Render Admin Delivery Notes Page */
    public function deliveryIndex()
    {
        $title = Lang::get('title.delivery_notes');
        $data['data'] = DeliveryNote::with('order')->get();
        // dd($data['data']);
        return view('backend.pages.delivery.index', $data)->withTitle($title);
    }

    /* Render Admin Delivery Note Detail Page */
    public function deliveryDetail($id)
    {
        $title = Lang::get('label.delivery_note').' #'.Helper::genID($id);
        $data['data'] = DeliveryNote::with('order')->find($id);
        $data['products'] = OrderProduct::with('product')->where('order_id', $data['data']->order_id)->get();
        return view('backend.pages.delivery.detail', $data)->withTitle($title);
    }

    // // Ajax Save Brand
    // public function store(Request $request)
    // {
    //     try {

    //         $rules = array(
    //             'brand_name' => 'required',
    //             'status' => 'required',
    //         );

    //         $niceNames = array(
    //             'brand_name' => 'Brand Name',
    //             'status' => 'Status',
    //         );

    //         $validator = Validator::make($request->all(), $rules);
    //         $validator->setAttributeNames($niceNames);

    //         if ($validator->fails()){

    //             $err_array = array(
    //                 'status' => 'error',
    //                 'message' => Lang::get('message.response.invalid_param')
    //             );

    //             return response()->json($err_array);

    //         } else {

    //             $image = '';

    //             if($request->file('image')){
    //                 $files = $request->file('image');
    //                 $file_extension = $files->getClientOriginalExtension();
    //                 $file_name = 'BR'.time().'-'.Str::random(6).'.'.$file_extension;
    //                 $targets = public_path()."/brands";
    //                 $files->move($targets, $file_name);
    //                 $image = $file_name;
    //             }

    //             $brand = new Brand;

    //             $brand->title = $request->brand_name;
    //             $brand->slug = Str::slug($request->brand_name);
    //             $brand->description = $request->description;
    //             $brand->brand_logo = $image;
    //             $brand->status = $request->status;

    //             $brand->save();

    //             $success_array = array(
    //                 'status' => 'success',
    //                 'message' => Lang::get('message.response.add_success')
    //             );

    //             return response()->json($success_array);
    //         }
    //     } catch (\Exception $e) {

    //         $error = $e->getMessage();

    //         $error_array = array(
    //             'status' => 'error',
    //             'message' => $error
    //         );

    //         return response()->json($error_array);
    //     }
    // }

    // // Ajax Update Brand
    // public function update(Request $request)
    // {
    //     try {

    //         $rules = array(
    //             'brand_name' => 'required',
    //             'status' => 'required',
    //         );

    //         $niceNames = array(
    //             'brand_name' => 'Brand Name',
    //             'status' => 'Status',
    //         );

    //         $validator = Validator::make($request->all(), $rules);
    //         $validator->setAttributeNames($niceNames);

    //         if ($validator->fails()){

    //             $err_array = array(
    //                 'status' => 'error',
    //                 'message' => Lang::get('message.response.invalid_param')
    //             );

    //             return response()->json($err_array);

    //         } else {

    //             $brand = Brand::find($request->id);

    //             if(empty($brand)){
    //                 $err_array = array(
    //                     'status' => 'error',
    //                     'message' => Lang::get('message.response.invalid_param')
    //                 );
    //                 return response()->json($err_array);
    //             }

    //             if($request->file('image')){
    //                 $files = $request->file('image');
    //                 $file_extension = $files->getClientOriginalExtension();
    //                 $file_name = 'BR'.time().'-'.Str::random(6).'.'.$file_extension;
    //                 $targets = public_path()."/brands";
    //                 $files->move($targets, $file_name);

    //                 $brand->brand_logo = $file_name;
    //             }

    //             if($request->avatar_remove > 0) {
    //                 $brand->brand_logo = '';
    //             }

    //             $brand->title = $request->brand_name;
    //             $brand->slug = Str::slug($request->brand_name);
    //             $brand->description = $request->description;
    //             $brand->status = $request->status;

    //             $brand->save();

    //             $success_array = array(
    //                 'status' => 'success',
    //                 'message' => Lang::get('message.response.update_success')
    //             );

    //             return response()->json($success_array);
    //         }
    //     } catch (\Exception $e) {

    //         $error = $e->getMessage();

    //         $error_array = array(
    //             'status' => 'error',
    //             'message' => $error
    //         );

    //         return response()->json($error_array);
    //     }
    // }

    // Ajax Delete Delivery Notes
    public function deliveryDelete(Request $request)
    {
        try {
            $ids = $request->ids;

            foreach($ids as $list)
            {
                DeliveryNote::find($list)->delete();
            }

            $success_array = array(
                'status' => 'success',
                'message' => Lang::get('message.response.delete_success'),
            );

            return response()->json($success_array);

        } catch (\Exception $e) {

            $error = $e->getMessage();

            $error_array = array(
                'status' => 'error',
                'message' => $error
            );

            return response()->json($error_array);
        }
    }
}
