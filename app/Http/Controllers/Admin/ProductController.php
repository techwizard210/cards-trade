<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Lang;
use Storage;
use File;

class ProductController extends Controller
{
    // Render Admin Products List Page
    public function index()
    {
        $title = Lang::get('title.products');
        $products = Product::orderBy('id', 'desc')->get();
        $data['products'] = $products;

        return view('backend.pages.product.index', $data)->withTitle($title);
    }

    // Render Admin Product Detail Page
    public function detail($id)
    {
        $title = Lang::get('label.product');

        $product = Product::find($id);
        if(empty($product)) abort(404);

        $review_data = ProductReview::with('user_info')->where('product_id', $id)->get();

        $data['product'] = $product;
        $data['reviews'] = $review_data;
        $data['brands'] = Brand::where('status', 'active')->get();
        $data['categories'] = Category::getAllParentWithChild();
        $title .= ' - '.$product->title;

        return view('backend.pages.product.detail', $data)->withTitle($title);
    }

    // Render Admin New Product Page
    public function add()
    {
        $title = Lang::get('title.new_product');
        $data['brands'] = Brand::where('status', 'active')->get();
        $data['categories'] = Category::getAllParentWithChild();
        return view('backend.pages.product.add', $data)->withTitle($title);
    }

    // Ajax Save New Product
    public function store(Request $request)
    {
        try {

            $rules = array(
                'product_name' => 'required',
                'category' => 'required',
                'brand' => 'required',
                'product_template' => 'required',
                'sku' => 'required',
                'shelf' => 'required',
                'price' => 'required',
                'discount_option' => 'required',
                'status' => 'required',
            );

            $niceNames = array(
                'product_name' => 'Product Name',
                'category' => 'Category',
                'brand' => 'Brand',
                'product_template' => 'Product Template',
                'sku' => 'SKU',
                'shelf' => 'Shelf Stock',
                'price' => 'Price',
                'discount_option' => 'Discount Option',
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

                if($request->file('product_image')){
                    $files = $request->file('product_image');
                    $file_extension = $files->getClientOriginalExtension();
                    $file_name = 'PR'.time().'-'.Str::random(6).'.'.$file_extension;
                    $targets = public_path()."/products";
                    $files->move($targets, $file_name);
                    $image = $file_name;
                }

                $attr_axis = '';
                $attr_rad = '';
                $attr_colors = '';
                $attr_dia = '';
                $attr_sph = '';
                $attr_cyl = '';
                $attr_add = '';

                if(!empty($request->attr_axis)) {
                    $arr_axis = array_column(json_decode($request->attr_axis), 'value');
                    sort($arr_axis);
                    $attr_axis = implode(', ', $arr_axis);
                }

                if(!empty($request->attr_colors)) {
                    $arr_colors = array_column(json_decode($request->attr_colors), 'value');
                    sort($arr_colors);
                    $attr_colors = implode(', ', $arr_colors);
                }

                if(!empty($request->attr_rad)) {
                    $arr_rad = array_column(json_decode($request->attr_rad), 'value');
                    sort($arr_rad);
                    $attr_rad = implode(', ', $arr_rad);
                }

                if(!empty($request->attr_dia)) {
                    $arr_dia = array_column(json_decode($request->attr_dia), 'value');
                    sort($arr_dia);
                    $attr_dia = implode(', ', $arr_dia);
                }

                if(!empty($request->attr_sph)) {
                    $arr_sph = array_column(json_decode($request->attr_sph), 'value');
                    sort($arr_sph);
                    $attr_sph = implode(', ', $arr_sph);
                }

                if(!empty($request->attr_cyl)) {
                    $arr_cyl = array_column(json_decode($request->attr_cyl), 'value');
                    sort($arr_cyl);
                    $attr_cyl = implode(', ', $arr_cyl);
                }

                if(!empty($request->attr_add)) {
                    $arr_add = array_column(json_decode($request->attr_add), 'value');
                    sort($arr_add);
                    $attr_add = implode(', ', $arr_add);
                }

                $product = new Product;

                $product->title = $request->product_name;
                $product->slug = Str::slug($request->product_name);
                $product->summary = $request->summary;
                $product->description = $request->description;
                $product->photo = $image;
                $product->stock = $request->shelf;
                $product->price = $request->price;
                $product->base_price = $request->base_price;
                $product->brand_id = $request->brand;
                $product->cat_id = $request->category;
                $product->SKU = $request->sku;
                $product->UPC = $request->UPC;
                $product->discount = 0;
                $product->is_featured = 1;
                $product->weight = $request->weight;
                $product->height = $request->height;
                $product->width = $request->width;
                $product->length = $request->length;
                $product->template = $request->product_template;
                $product->discount_option = $request->discount_option;
                $product->status = $request->status;

                $product->SPH = $attr_sph;
                $product->DIA = $attr_dia;
                $product->CYL = $attr_cyl;
                $product->AXIS = $attr_axis;
                $product->RAD = $attr_rad;
                $product->ADD = $attr_add;
                $product->colors = $attr_colors;
                $product->quantity = 10;



                $product->save();

                $success_array = array(
                    'status' => 'success',
                    'message' => Lang::get('message.response.add_success'),
                    'product_id' => $product->id,
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

    /* Ajax Admin Delete Products*/
    public function productDelete(Request $request)
    {
        try {
            $ids = $request->ids;

            foreach($ids as $list)
            {
                Product::find($list)->delete();
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

    // Ajax Update Product
    public function update(Request $request)
    {
        try {

            $rules = array(
                'product_name' => 'required',
                'category' => 'required',
                'brand' => 'required',
                'product_template' => 'required',
                'sku' => 'required',
                'shelf' => 'required',
                'price' => 'required',
                'discount_option' => 'required',
                'status' => 'required',
            );

            $niceNames = array(
                'product_name' => 'Product Name',
                'category' => 'Category',
                'brand' => 'Brand',
                'product_template' => 'Product Template',
                'sku' => 'SKU',
                'shelf' => 'Shelf Stock',
                'price' => 'Price',
                'discount_option' => 'Discount Option',
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

                $product = Product::find($request->product_id);

                if($request->file('product_image')){
                    $files = $request->file('product_image');
                    $file_extension = $files->getClientOriginalExtension();
                    $file_name = 'PR'.time().'-'.Str::random(6).'.'.$file_extension;
                    $targets = public_path()."/products";
                    $files->move($targets, $file_name);

                    $product->photo = $file_name;
                }

                if($request->avatar_remove > 0) {
                    $product->photo = '';
                }

                $attr_axis = '';
                $attr_rad = '';
                $attr_colors = '';
                $attr_dia = '';
                $attr_sph = '';
                $attr_cyl = '';
                $attr_add = '';

                if(!empty($request->attr_axis)) {
                    $arr_axis = array_column(json_decode($request->attr_axis), 'value');
                    sort($arr_axis);
                    $attr_axis = implode(', ', $arr_axis);
                }

                if(!empty($request->attr_colors)) {
                    $arr_colors = array_column(json_decode($request->attr_colors), 'value');
                    sort($arr_colors);
                    $attr_colors = implode(', ', $arr_colors);
                }

                if(!empty($request->attr_rad)) {
                    $arr_rad = array_column(json_decode($request->attr_rad), 'value');
                    sort($arr_rad);
                    $attr_rad = implode(', ', $arr_rad);
                }

                if(!empty($request->attr_dia)) {
                    $arr_dia = array_column(json_decode($request->attr_dia), 'value');
                    sort($arr_dia);
                    $attr_dia = implode(', ', $arr_dia);
                }

                if(!empty($request->attr_sph)) {
                    $arr_sph = array_column(json_decode($request->attr_sph), 'value');
                    sort($arr_sph);
                    $attr_sph = implode(', ', $arr_sph);
                }

                if(!empty($request->attr_cyl)) {
                    $arr_cyl = array_column(json_decode($request->attr_cyl), 'value');
                    sort($arr_cyl);
                    $attr_cyl = implode(', ', $arr_cyl);
                }

                if(!empty($request->attr_add)) {
                    $arr_add = array_column(json_decode($request->attr_add), 'value');
                    sort($arr_add);
                    $attr_add = implode(', ', $arr_add);
                }

                $product->title = $request->product_name;
                $product->summary = $request->summary;
                $product->description = $request->description;
                $product->stock = $request->shelf;
                $product->price = $request->price;
                $product->base_price = $request->base_price;
                $product->brand_id = $request->brand;
                $product->cat_id = $request->category;
                $product->SKU = $request->sku;
                $product->UPC = $request->UPC;
                $product->discount = 0;
                $product->is_featured = 1;
                $product->weight = $request->weight;
                $product->height = $request->height;
                $product->width = $request->width;
                $product->length = $request->length;
                $product->template = $request->product_template;
                $product->discount_option = $request->discount_option;
                $product->status = $request->status;

                $product->SPH = $attr_sph;
                $product->DIA = $attr_dia;
                $product->CYL = $attr_cyl;
                $product->AXIS = $attr_axis;
                $product->RAD = $attr_rad;
                $product->ADD = $attr_add;
                $product->colors = $attr_colors;

                $product->save();

                $success_array = array(
                    'status' => 'success',
                    'message' => Lang::get('message.response.add_success'),
                    'product_id' => $product->id,
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

    // Ajax Save Product Images
    public function addProductImages(Request $request)
    {
        try {
            $images = $request->file('file');
            $product_id = $request->product_id;

            foreach($images as $list)
            {
                $file_extension = $list->getClientOriginalExtension();
                $file_size = $list->getSize();
                $file_name = 'PR'.time().'-'.Str::random(6).'.'.$file_extension;
                $targets = public_path()."/products";
                $list->move($targets, $file_name);

                $product_image = new ProductImage();

                $product_image->url = $file_name;
                $product_image->product_id = $product_id;
                $product_image->size = $file_size;

                $product_image->save();
            }

            return response()->json(['status' => 'success']);

        } catch (\Exception $e) {

            $error_array = array(
                'status' => 'error',
                'message' => $e->getMessage()
            );

            return response()->json($error_array);
        }
    }

    // Ajax Get Product Images
    public function getProductImages(Request $request)
    {
        $product_id = $request->product_id;
        $data = ProductImage::where('product_id', $product_id)->get();
        return response()->json($data);
    }

    // Ajax Remove Product Image
    public function removeProductImages(Request $request)
    {
        $filename =  $request->get('filename');
        ProductImage::where('url', $filename)->delete();
        $path = public_path('/public/products/').$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }

    // Ajax Product Import from CSV
    public function productImport(Request $request)
    {
        try {
            if($request->file('file_content')){

                $csv_file = $request->file('file_content');

                $file_extension = $csv_file->getClientOriginalExtension();

                if($file_extension == 'csv' || $file_extension == 'CSV'){

                    $file_size = $csv_file->getSize();
                    $file_name = 'Products'.time().'.'.$file_extension;
                    $targets = public_path()."/storage/data";
                    $csv_file->move($targets, $file_name);

                    $file = fopen($targets.'/'.$file_name, "r");

                    $importData_arr = array(); // Read through the file and store the contents as an array
                    $i = 0;
                    //Read the contents of the uploaded file
                    while (($filedata = fgetcsv($file, 10000, ",")) !== FALSE) {
                        $num = count($filedata);
                        // Skip first row (Remove below comment if you want to skip the first row)
                        if ($i == 0) {
                            $i++;
                            continue;
                        }
                        for ($c = 0; $c < $num; $c++) {
                            $importData_arr[$i][] = $filedata[$c];
                        }
                        $i++;
                    }

                    fclose($file); //Close after reading

                    $j = 0;
                    foreach ($importData_arr as $importData) {
                        if(!empty($importData[0]))
                        {
                            $url = $importData[4];
                            $contents = file_get_contents($url);
                            $name = 'PR'.time().substr($url, strrpos($url, '/') + 1);
                            Storage::disk('public_folder')->put('products/'.$name, $contents);

                            $product = new Product;
                            $product->title = $importData[1];
                            $product->slug = Str::slug($importData[1]);
                            $product->summary = $importData[6];
                            $product->description = $importData[2];
                            $product->price = $importData[5];
                            $product->base_price = $importData[5];
                            $product->SKU = $importData[0];
                            $product->UPC = $importData[0];
                            $product->discount = 0;
                            $product->is_featured = 1;
                            $product->photo = $name;

                            $product->save();
                            $j++;
                        }

                    }

                    return response()->json([
                        'status' => 'success',
                        'message' => $j.' Products has been imported.'
                    ]);

                } else {
                    $err_array = array(
                        'status' => 'error',
                        'message' => Lang::get('message.response.invalid_param')
                    );
                    return response()->json($err_array);
                }

            } else {
                $err_array = array(
                    'status' => 'error',
                    'message' => Lang::get('message.response.invalid_param')
                );
                return response()->json($err_array);
            }

        } catch (\Exception $e) {

            $error_array = array(
                'status' => 'error',
                'message' => $e->getMessage()
            );

            return response()->json($error_array);
        }
    }
}
