<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Lang;
use Hash;
use Str;
use DB;
use Helper;

class UserController extends Controller
{

    /* Render User Index Page */
    public function index()
    {
        $title = Lang::get('title.users');
        $user_data = User::all();
        $data['total'] = number_format(count($user_data), 0);
        $data['data'] = $user_data;

        return view('backend.pages.user.index', $data)->withTitle($title);
    }

    /* Ajax Get User List Data */
    public function getUserData()
    {
        $data['data'] = User::all();
        return response()->json($data);
    }

    /* Render User Detail Page */
    public function detail($id)
    {
        $title = Lang::get('label.customer');
        $user = User::find($id);
        if(empty($user)) abort(404);
        $data['user'] = $user;
        $title .= ' - '.$user->name;

        $data['countries'] = DB::table('countries')->get();
        $data['states'] = DB::table('states')->where('country_id', $user->country)->get();

        return view('backend.pages.user.detail', $data)->withTitle($title);
    }

    /* Ajax Usre Import from CSV */
    public function userImport(Request $request)
    {
        try {
            if($request->file('file_content')){

                $csv_file = $request->file('file_content');

                $file_extension = $csv_file->getClientOriginalExtension();

                if($file_extension == 'csv' || $file_extension == 'CSV'){

                    $file_size = $csv_file->getSize();
                    $file_name = 'Users'.time().'.'.$file_extension;
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
                        if(!empty($importData[4]))
                        {
                            $check_mail = User::where('email', $importData[4])->get();
                            if(count($check_mail) == 0){
                                $name_parts = explode(" ", $importData[1]);
                                if(count($name_parts) > 1) {
                                    $lastname = array_pop($name_parts);
                                    $firstname = implode(" ", $name_parts);
                                }
                                else
                                {
                                    $firstname = $importData[1];
                                    $lastname = " ";
                                }

                                $country = DB::table('countries')->where('iso2', $importData[12])->first();
                                if(empty($country)) $country_id = 0;
                                else $country_id = $country->id;


                                $user = new User;

                                $user->first_name = mb_convert_encoding($firstname, 'UTF-8', 'UTF-8');
                                $user->last_name = mb_convert_encoding($lastname, 'UTF-8', 'UTF-8');
                                $user->name = mb_convert_encoding($importData[1], 'UTF-8', 'UTF-8');
                                $user->company_name = mb_convert_encoding($importData[2], 'UTF-8', 'UTF-8');
                                $user->customer_id = 'ID-'.date('Y').Helper::genID(mt_rand(1, 999999));
                                $user->language = mb_convert_encoding($importData[3], 'UTF-8', 'UTF-8');
                                $user->email = mb_convert_encoding($importData[4], 'UTF-8', 'UTF-8');
                                $user->password = Hash::make(Str::random(6));
                                $user->phone = mb_convert_encoding($importData[5], 'UTF-8', 'UTF-8');
                                $user->note = mb_convert_encoding($importData[6], 'UTF-8', 'UTF-8');
                                $user->address1 = mb_convert_encoding($importData[9].' '.$importData[7], 'UTF-8', 'UTF-8');
                                $user->address2 = mb_convert_encoding($importData[8], 'UTF-8', 'UTF-8');
                                $user->post_code = mb_convert_encoding($importData[10], 'UTF-8', 'UTF-8');
                                $user->city = mb_convert_encoding($importData[11], 'UTF-8', 'UTF-8');
                                $user->country = $country_id;
                                $user->status = 'inactive';

                                $user->save();
                                $j++;
                            }
                        }

                    }

                    return response()->json([
                        'status' => 'success',
                        'message' => $j.' Users has been imported.'
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

    /* Ajax Admin Delete Users */
    public function userDelete(Request $request)
    {
        try {
            $ids = $request->ids;

            foreach($ids as $list)
            {
                $user = User::find($list);
                if(!empty($user)) $user->delete();
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

    /* Ajax User Profile Update */
    public function userUpdate(Request $request)
    {
        try {

            $user = User::find($request->id);

            if($files = $request->file('avatar'))
            {
                $file_extension = $files->getClientOriginalExtension();
                $file_name = 'CS'.time().'-'.Str::random(6).'.'.$file_extension;
                $targets = public_path()."/users";
                $files->move($targets, $file_name);

                $user->photo = $file_name;
            }

            if($request->avatar_remove > 0) {
                $user->photo = '';
            }

            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->company_name = $request->company_name;
            $user->country = $request->country;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->address1 = $request->address1;
            $user->address2 = $request->address2;
            $user->post_code = $request->post_code;
            $user->note = $request->note;
            $user->status = $request->status;

            $user->save();

            // $this->changeStatusEmail($request->status, $request->id);

            $data = array(
                'status' => 'success',
                'message' => 'User Updated successfully.',
            );

            return response()->json($data);

        } catch (\Exception $e) {

            $error_array = array(
                'status' => 'error',
                'message' => $e->getMessage()
            );

            return response()->json($error_array);
        }

    }

    /* Ajax User Phone Update */
    public function userUpdatePhone(Request $request)
    {
        try {
            $id = $request->id;

            $user = User::find($id);
            $user->phone = $request->phone;

            $user->save();

            $success_array = array(
                'status' => 'success',
                'message' => Lang::get('message.response.updatesuccess'),
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
