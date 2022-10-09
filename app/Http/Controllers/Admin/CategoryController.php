<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Lang;

class CategoryController extends Controller
{
    // Render Admin Category Index Page
    public function index()
    {
        $title = Lang::get('title.categories');
        $data['data'] = Category::with('parent_info')->where('is_parent', 0)->get();
        return view('backend.pages.category.index', $data)->withTitle($title);
    }

    // Render Admin New Category Page
    public function add()
    {
        $title = Lang::get('title.new_category');
        $data['category_types'] = Category::where('is_parent', 1)->get();
        return view('backend.pages.category.add', $data)->withTitle($title);
    }

    // Render Admin Category Detail Page
    public function edit($id)
    {
        $data['content'] = Category::find($id);
        if(empty($data['content'])) abort(404);
        $data['category_types'] = Category::where('is_parent', 1)->get();
        $title = Lang::get('label.category').' - '.$data['content']->title;
        return view('backend.pages.category.edit', $data)->withTitle($title);
    }

    // Ajax Update Category
    public function update(Request $request)
    {
        try {

            $rules = array(
                'id' => 'required',
                'category_name' => 'required',
                'category_type' => 'required',
                'status' => 'required',
            );

            $niceNames = array(
                'id' => 'ID',
                'category_name' => 'Category Name',
                'category_type' => 'Category Type',
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

                $category = Category::find($request->id);

                if(empty($category)){
                    $err_array = array(
                        'status' => 'error',
                        'message' => Lang::get('message.response.invalid_param')
                    );
                    return response()->json($err_array);
                }

                if($request->file('image')){
                    $files = $request->file('image');
                    $file_extension = $files->getClientOriginalExtension();
                    $file_name = 'CT'.time().'-'.Str::random(6).'.'.$file_extension;
                    $targets = public_path()."/categories";
                    $files->move($targets, $file_name);

                    $category->photo = $file_name;
                }

                if($request->avatar_remove > 0) {
                    $category->photo = '';
                }

                $category->title = $request->category_name;
                $category->slug = Str::slug($request->category_name);
                $category->summary = $request->category_description;
                $category->parent_id = $request->category_type;
                $category->status = $request->status;

                $category->save();

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

    // Ajax Save New Category
    public function store(Request $request)
    {
        try {

            $rules = array(
                'category_name' => 'required',
                'category_type' => 'required',
                'status' => 'required',
            );

            $niceNames = array(
                'category_name' => 'Category Name',
                'category_type' => 'Category Type',
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
                    $file_name = 'CT'.time().'-'.Str::random(6).'.'.$file_extension;
                    $targets = public_path()."/categories";
                    $files->move($targets, $file_name);
                    $image = $file_name;
                }

                $category = new Category;

                $category->title = $request->category_name;
                $category->slug = Str::slug($request->category_name);
                $category->is_parent = 0;
                $category->summary = $request->category_description;
                $category->photo = $image;
                $category->parent_id = $request->category_type;
                $category->status = $request->status;

                $category->save();

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

    // Ajax Delete Categories
    public function delete(Request $request)
    {
        try {
            $ids = $request->ids;

            foreach($ids as $list)
            {
                Category::find($list)->delete();
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
