<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Lang;

class BrandController extends Controller
{
    // Render Admin Brands List Page
    public function index()
    {
        $title = Lang::get('title.brands');
        $data['data'] = Brand::all();
        return view('backend.pages.brand.index', $data)->withTitle($title);
    }

    // Render Admin New Brand Page
    public function add()
    {
        $title = Lang::get('title.new_brand');
        return view('backend.pages.brand.add')->withTitle($title);
    }

    // Render Admin Brand Detail Page
    public function edit($id)
    {
        $data['content'] = Brand::find($id);
        if(empty($data['content'])) abort(404);
        $title = Lang::get('label.brand').' - '.$data['content']->title;
        return view('backend.pages.brand.edit', $data)->withTitle($title);
    }

    // Ajax Save Brand
    public function store(Request $request)
    {
        try {

            $rules = array(
                'brand_name' => 'required',
                'status' => 'required',
            );

            $niceNames = array(
                'brand_name' => 'Brand Name',
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
                    $file_name = 'BR'.time().'-'.Str::random(6).'.'.$file_extension;
                    $targets = public_path()."/brands";
                    $files->move($targets, $file_name);
                    $image = $file_name;
                }

                $brand = new Brand;

                $brand->title = $request->brand_name;
                $brand->slug = Str::slug($request->brand_name);
                $brand->description = $request->description;
                $brand->brand_logo = $image;
                $brand->status = $request->status;

                $brand->save();

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

    // Ajax Update Brand
    public function update(Request $request)
    {
        try {

            $rules = array(
                'brand_name' => 'required',
                'status' => 'required',
            );

            $niceNames = array(
                'brand_name' => 'Brand Name',
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

                $brand = Brand::find($request->id);

                if(empty($brand)){
                    $err_array = array(
                        'status' => 'error',
                        'message' => Lang::get('message.response.invalid_param')
                    );
                    return response()->json($err_array);
                }

                if($request->file('image')){
                    $files = $request->file('image');
                    $file_extension = $files->getClientOriginalExtension();
                    $file_name = 'BR'.time().'-'.Str::random(6).'.'.$file_extension;
                    $targets = public_path()."/brands";
                    $files->move($targets, $file_name);

                    $brand->brand_logo = $file_name;
                }

                if($request->avatar_remove > 0) {
                    $brand->brand_logo = '';
                }

                $brand->title = $request->brand_name;
                $brand->slug = Str::slug($request->brand_name);
                $brand->description = $request->description;
                $brand->status = $request->status;

                $brand->save();

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

    // Ajax Delete Categories
    public function delete(Request $request)
    {
        try {
            $ids = $request->ids;

            foreach($ids as $list)
            {
                Brand::find($list)->delete();
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
