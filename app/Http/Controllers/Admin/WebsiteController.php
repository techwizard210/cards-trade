<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Lang;

class WebsiteController extends Controller
{
    // Render Admin Banners List Page
    public function bannerIndex()
    {
        $title = Lang::get('title.banners');
        $data['data'] = Banner::all();
        return view('backend.pages.banner.index', $data)->withTitle($title);
    }

    // Render Admin New Banner Page
    public function bannerAdd()
    {
        $title = Lang::get('title.new_banner');
        return view('backend.pages.banner.add')->withTitle($title);
    }

    // Render Admin Banner Detail Page
    public function bannerDetail($id)
    {
        $data['content'] = Banner::find($id);
        if(empty($data['content'])) abort(404);
        $title = Lang::get('label.brand').' - '.$data['content']->title;
        return view('backend.pages.banner.edit', $data)->withTitle($title);
    }

    // Ajax Save Banner
    public function bannerSave(Request $request)
    {
        try {

            $rules = array(
                'title' => 'required',
                'status' => 'required',
            );

            $niceNames = array(
                'title' => 'Title',
                'status' => 'Status',
            );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($niceNames);

            if ($validator->fails()){

                $err_array = array(
                    'status' => 'error',
                    'message' => Lang::get('message.response.invalid_param')
                );

                return response()->json($err_array);

            } else {

                $image = '';

                if($request->file('image')){
                    $files = $request->file('image');
                    $file_extension = $files->getClientOriginalExtension();
                    $file_name = 'BN'.time().'-'.Str::random(6).'.'.$file_extension;
                    $targets = public_path()."/storage/banners";
                    $files->move($targets, $file_name);
                    $image = $file_name;
                }

                $banner = new Banner;

                $banner->title = $request->title;
                $banner->subtitle = $request->subtitle;
                $banner->desc1 = $request->description1;
                $banner->desc2 = $request->description2;
                $banner->desc3 = $request->description3;
                $banner->price = $request->price;
                $banner->photo = $image;
                $banner->brand_id = 1;
                $banner->background_img = 'test';
                $banner->status = $request->status;

                $banner->save();

                $success_array = array(
                    'status' => 'success',
                    'message' => Lang::get('message.response.add_success')
                );

                return response()->json($success_array);
            }
        } catch (\Exception $e) {

            $error = $e->getMessage();

            $error_array = array(
                'status' => 'error',
                'message' => $error
            );

            return response()->json($error_array);
        }
    }

    // Ajax Update Banner
    public function bannerUpdate(Request $request)
    {
        try {

            $rules = array(
                'title' => 'required',
                'status' => 'required',
            );

            $niceNames = array(
                'title' => 'Title',
                'status' => 'Status',
            );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($niceNames);

            if ($validator->fails()){

                $err_array = array(
                    'status' => 'error',
                    'message' => Lang::get('message.response.invalid_param'),
                );

                return response()->json($err_array);

            } else {

                $banner = Banner::find($request->id);

                if(empty($banner)){
                    $err_array = array(
                        'status' => 'error',
                        'message' => Lang::get('message.response.invalid_param')
                    );
                    return response()->json($err_array);
                }

                if($request->file('image')){
                    $files = $request->file('image');
                    $file_extension = $files->getClientOriginalExtension();
                    $file_name = 'BN'.time().'-'.Str::random(6).'.'.$file_extension;
                    $targets = public_path()."/storage/banners";
                    $files->move($targets, $file_name);

                    $banner->photo = $file_name;
                }

                if($request->avatar_remove > 0) {
                    $banner->photo = '';
                }

                $banner->title = $request->title;
                $banner->subtitle = $request->subtitle;
                $banner->desc1 = $request->description1;
                $banner->desc2 = $request->description2;
                $banner->desc3 = $request->description3;
                $banner->price = $request->price;
                $banner->status = $request->status;

                $banner->save();

                $success_array = array(
                    'status' => 'success',
                    'message' => Lang::get('message.response.update_success')
                );

                return response()->json($success_array);
            }
        } catch (\Exception $e) {

            $error = $e->getMessage();

            $error_array = array(
                'status' => 'error',
                'message' => $error
            );

            return response()->json($error_array);
        }
    }

    // Ajax Delete Banners
    public function bannerDelete(Request $request)
    {
        try {
            $ids = $request->ids;

            foreach($ids as $list)
            {
                Banner::find($list)->delete();
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

    // Render Admin Partner Opticians List Page
    public function partnerIndex()
    {
        $title = Lang::get('title.partners');
        $data['data'] = Partner::all();
        return view('backend.pages.partner.index', $data)->withTitle($title);
    }

    // Ajax Save Partner
    public function partnerSave(Request $request)
    {
        try {

            $rules = array(
                'name' => 'required',
            );

            $niceNames = array(
                'name' => 'Name',
            );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($niceNames);

            if ($validator->fails()){

                $err_array = array(
                    'status' => 'error',
                    'message' => Lang::get('message.response.invalid_param')
                );

                return response()->json($err_array);

            } else {

                $partner = new Partner;

                $partner->name = $request->name;
                $partner->url = $request->URL;
                $partner->status = 'active';

                $partner->save();

                $success_array = array(
                    'status' => 'success',
                    'message' => Lang::get('message.response.add_success')
                );

                return response()->json($success_array);
            }
        } catch (\Exception $e) {

            $error = $e->getMessage();

            $error_array = array(
                'status' => 'error',
                'message' => $error
            );

            return response()->json($error_array);
        }
    }

    // Ajax Delete Partners
    public function partnerDelete(Request $request)
    {
        try {
            $ids = $request->ids;

            foreach($ids as $list)
            {
                Partner::find($list)->delete();
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

    // Ajax Get Partners
    public function partnerGet(Request $request)
    {
        try {
            $id = $request->id;

            $data = Partner::find($id);

            $success_array = array(
                'status' => 'success',
                'content' => $data
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

    // Ajax Update Partner
    public function partnerUpdate(Request $request)
    {
        try {

            $rules = array(
                'name' => 'required',
            );

            $niceNames = array(
                'name' => 'Name',
            );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($niceNames);

            if ($validator->fails()){

                $err_array = array(
                    'status' => 'error',
                    'message' => Lang::get('message.response.invalid_param')
                );

                return response()->json($err_array);

            } else {

                $partner = Partner::find($request->id);

                $partner->name = $request->name;
                $partner->url = $request->URL;

                $partner->save();

                $success_array = array(
                    'status' => 'success',
                    'message' => Lang::get('message.response.update_success')
                );

                return response()->json($success_array);
            }
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
