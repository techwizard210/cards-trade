<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\EmailController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Admin;
use App\Agent;
use App\Models\Country;
use App\Models\Secondorder;
use App\Models\Statement;
use Auth;
use Mail;
use Lang;
use Helper;
use DB;

class CustomerController extends Controller
{
    // View Users Page
    public function index()
    {
        return view('admin.users.index')->withTitle('Users');
    }

    // Get Users List Data
    public function getUserData()
    {
        $data = User::select('users.*', 'countries.name as country_name')
            ->leftJoin('countries', 'countries.id', '=', 'users.country')
            ->orderBy('users.id', 'DESC')->get();

        return response()->json($data);
    }

    /* Delete Users */
    public function deleteUsers(Request $request)
    {
        $ids = $request->ids;

        foreach($ids as $list)
        {
            try {

                User::find($list)->delete();

            } catch (\Exception $e) {

                $data = array(
                    'status' => 'error',
                    'message' => 'Error occured when delete data.'
                );

                return response()->json($data);
            }

        }

        $data = array(
            'status' => 'success',
            'message' => 'Delete User successfully.',
        );

        return response()->json($data);

    }

    /* Update Users Status */
    public function updateUsersStatus(Request $request)
    {
        $ids = $request->ids;
        $status =  $request->status;

        foreach($ids as $list)
        {
            try {

                $user = User::find($list);
                $user->status = $status;
                $user->save();

                $this->changeStatusEmail($status, $list);

            } catch (\Exception $e) {

                $error_array = array(
                    'status'=>'error',
                    'message'=> 'Database Connection Error!'
                );

                return response()->json($error_array);
            }
        }

        $data = array(
            'status' => 'success',
            'message' => 'User status updated successfully.',
        );

        return response()->json($data);
    }

    /* View User Detail Page */
    public function view_user($id)
    {
        $title = Lang::get('title.user_detail');

        $data['users'] = User::where('id', $id)->first();
        $data['agents'] = Agent::all();
        $data['countries'] = Country::all();

        return view('admin.users.user-detail',$data)->withTitle($title);

    }

    /* Update User Detail */
    public function updateUser(Request $request)
    {
        try {

            $dialcode = '';

            if($request->has('country')) {

                $countryData = Country::where('long_name', $request->country)->first();

                if(isset($countryData)){

                    $dialcode = $countryData->phone_code;

                }
            }

            $image='';

            if($files = $request->file('profile_avatar')){

                $file_extension = $files->getClientOriginalExtension();
                $file_name = 'CS'.time().'-'.str_random(6).'.'.$file_extension;
                $targets = base_path()."/public/user";
                $files->move($targets, $file_name);
                $image = "/public/user/".$file_name;

            } else {

                $image = $request->old_image;

            }

            $user = User::find($request->id);

            $user->firstname   = $request->firstname;
            $user->lastname   = $request->lastname;
            $user->email   = $request->email;
            $user->company_name   = $request->company_name;
            $user->country   = $request->country;
            $user->city   = $request->city;
            $user->street   = $request->address;
            $user->zip   = $request->zip;
            $user->phone   = $request->phone;
            $user->dialcode   = $dialcode;
            $user->website   = $request->website;
            $user->uid   = $request->uid;
            $user->EORI = $request->EORI;
            $user->profile   = $image;
            $user->comment = $request->comment;
            $user->status = $request->status;
            $user->agent_id = $request->agent;

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

    /* View User Orders Page */
    public function user_orders($id)
    {
        $title = Lang::get('title.user_orders');

        $data['users'] = User::where('id', $id)->first();

        return view('admin.users.user-orders',$data)->withTitle($title);

    }

    /* Ajax get user's order statistics data */
    public function get_user_order_data($id)
    {
        $data1 = array();
        $data2 = array();

        for($i = 1; $i < 13; $i++)
        {
            if($i % 10 > 0) $month = $i;
            else $month = '0'.$i;

            $total1 = 0;
            $total2 = 0;

            $order_data1 = Secondorder::where('user_id', $id)
                ->where('payment_status', 'Completed')
                ->whereYear('created_at', date('Y'))
                ->whereMonth('created_at', $month)
                ->get();

            if(count($order_data1)>0){
                foreach($order_data1 as $item)
                {
                    $order_detail = Helper::getOrderDetail($item->id);
                    $total1 += $order_detail['total'];
                }
            }

            $order_data2 = Secondorder::where('user_id', $id)
                ->where('status', 1)
                ->where('payment_status', '!=', 'Completed')
                ->whereYear('created_at', date('Y'))
                ->whereMonth('created_at', $month)
                ->get();

            if(count($order_data2)>0){
                foreach($order_data2 as $item)
                {
                    $order_detail = Helper::getOrderDetail($item->id);
                    $total2 += $order_detail['total'];
                }
            }


            array_push($data1, ['x' => '', 'y' => round($total1, 2), 'z' => count($order_data1) ]);
            array_push($data2, ['x' => '', 'y' => round($total2, 2), 'z' => count($order_data2) ]);
        }

        $res =  array(
            'data1' => $data1,
            'data2' => $data2,
        );

        return response()->json($res);
    }

    /* View Add User Page */
    public function add_user(){

        $data['countries'] = Country::all();
        $data['agents'] = Agent::all();

        return view('admin.users.add-user', $data)->withTitle('Add User');

    }

    /* Add New User */
    public function add_new_user(Request $request, EmailController $email_controller)
    {
        try {

            $email_exist = User::where('email', $request->email)->get();

            if(count($email_exist)>0) {

                $data = array(
                    'status' => 'error',
                    'message' => 'Email exist already.',
                );

                return response()->json($data);

            } else {

                $dialcode = '';

                if($request->has('country')) {

                    $countryData = Country::where('long_name', $request->country)->first();

                    if(isset($countryData)){

                        $dialcode = $countryData->phone_code;

                    }
                }

                $image = '';

                if($files = $request->file('profile_avatar')){

                    $file = $files->getClientOriginalName();
                    $targets = base_path()."/public/user";
                    $files->move($targets, $file);
                    $image= "/public/user/".$file;

                }

                $user = new User;

                $user->firstname   = $request->firstname;
                $user->lastname   = $request->lastname;
                $user->email   = $request->email;
                $user->company_name   = $request->company_name;
                $user->country   = $request->country;
                $user->city   = $request->city;
                $user->street   = $request->address;
                $user->zip   = $request->zip;
                $user->phone   = $request->phone;
                $user->dialcode   = $dialcode;
                $user->website   = $request->website;
                $user->uid   = $request->uid;
                $user->profile   = $image;
                $user->comment = $request->comment;
                $user->status = $request->status;
                $user->password = Hash::make($request->password);
                $user->agent_id = $request->agent;
                $user->EORI = $request->EORI;

                $user->save();

                $mailData = array(
                    'user_name' => $user->firstname.' '.$user->lastname,
                    'user_email' => $user->email,
                    'user_password' => $request->password,
                    'subject' => 'Registration',
                );

                $email_controller->register_mail($mailData);

                $data = array(
                    'status' => 'success',
                    'message' => 'User added successfully.',
                );

                return response()->json($data);

            }

        } catch (\Exception $e) {

            $error_array = array(
                'status'=>'error',
                'message'=> 'Some error occured during User insert.'
            );

            return response()->json($error_array);
        }
    }

    /* Render User Change Password Page */
    public function userSetting($id)
    {
        $title = Lang::get('title.change_password');

        $users = User::find($id);

        $data['users'] = $users;

        return view('admin.users.change-password', $data)->withTitle($title);
    }

    /* Ajax Change User Password */
    public function updateUserPassword(Request $request)
    {
        try {

            $admin = Admin::find(Auth::guard('admin')->user()->id);

            if(Hash::check($request->admin_password, $admin->password))
            {
                $user = User::find($request->user_id);

                if(!empty($user))
                {
                    $user->password = Hash::make($request->password);
                    $user->save();

                    $success_array = array(
                        'status' => 'success',
                        'message' => Lang::get('messages.response.change_password_success')
                    );

                    return response()->json($success_array);

                } else {

                    $error_array = array(
                        'status' => 'error',
                        'message' => Lang::get('messages.response.invalid_param')
                    );

                    return response()->json($error_array);
                }

            } else {

                $error_array = array(
                    'status' => 'error',
                    'message' => Lang::get('messages.response.admin_password_error')
                );

                return response()->json($error_array);
            }

        } catch (\Exception $e) {

            $error_array = array(
                'status' => 'error',
                'message' => $e->getMessage(),
            );

            return response()->json($error_array);
        }

    }

    /* Ajax Send User Password Reset Email */
    public function sendUserPasswordResetEmail(Request $request, EmailController $email_controller)
    {
        try {

            $user = User::find($request->user_id);

            if(!empty($user))
            {
                //Create Password Reset Token
                DB::table('password_resets')->insert([
                    'email' => $user->email,
                    'token' => str_random(60),
                ]);

                //Get the token just created above
                $tokenData = DB::table('password_resets')
                    ->where('email', $user->email)
                    ->get()
                    ->last();

                if($email_controller->forgot_password($user->email, $tokenData->token)) {

                    $data = array(
                        'status' => 'success',
                        'message' => Lang::get('messages.response.reset_email_success'),
                    );

                    return response()->json($data);

                } else {

                    $data = array(
                        'status' => 'error',
                        'message' => Lang::get('messages.response.unknown_error'),
                    );

                    return response()->json($data);
                }

            } else {

                $error_array = array(
                    'status' => 'error',
                    'message' => Lang::get('messages.response.invalid_param')
                );

                return response()->json($error_array);
            }

        } catch (\Exception $e) {

            $error_array = array(
                'status' => 'error',
                'message' => $e->getMessage(),
            );

            return response()->json($error_array);
        }

    }

    /* Send Email about Change Status */
    public function changeStatusEmail($status, $user_id)
    {
        $user = User::find($user_id);

        if($status == 'Active')
        {
            $data['admin_email'] = 'order@eyeart.ch';
            $data['user'] = $user;
            $data['user_name'] = Helper::getUserName($data['user']->id);
            $data['user_email'] = $data['user']->email;
            $data['subject'] = 'Account Approved';

            Mail::send('web.mail.approve_registration_user', $data, function ($message) use ($data) {
                $message->to($data['user_email'], $data['user_name'])->subject($data['subject']);
                $message->from(env('MAIL_USERNAME'), 'Eyeart');
            });

            Mail::send('web.mail.approve_registration_user', $data, function ($message) use ($data) {
                $message->to($data['admin_email'], $data['user_name'])->subject($data['subject']);
                $message->from(env('MAIL_USERNAME'), 'Eyeart');
            });

        }

        if($status == 'Inactive')
        {
            $data['admin_email'] = 'order@eyeart.ch';
            $data['user'] = $user;
            $data['user_name'] = Helper::getUserName($data['user']->id);
            $data['user_email'] = $data['user']->email;
            $data['subject'] = 'Account Unapproved';

            Mail::send('web.mail.unapprove_user', $data, function ($message) use ($data) {
                $message->to($data['user_email'], $data['user_name'])->subject($data['subject']);
                $message->from(env('MAIL_USERNAME'), 'Eyeart');
            });

            Mail::send('web.mail.unapprove_admin', $data, function ($message) use ($data) {
                $message->to($data['admin_email'], $data['user_name'])->subject($data['subject']);
                $message->from(env('MAIL_USERNAME'), 'Eyeart');
            });

        }

        return TRUE;
    }

    /* Ajax Change User Balance */
    public function updateUserBalance(Request $request)
    {
        try {

            $user = User::find($request->user_id);

            if(!empty($user))
            {
                $change = $request->amount - $user->balance;

                $user->balance = $request->amount;
                $user->save();

                $statement =  new Statement;

                $statement->user_id = $request->user_id;
                $statement->user_type = 'user';
                $statement->status = 'completed';
                $statement->amount = $change;
                $statement->comment = 'Manual Balance - '.$request->comment;

                $statement->save();

                $statement_sn = date('Y').'-';
                for( $i = 0 ; $i < 5 - strlen($statement->id) ; $i++ ) $statement_sn .= '0';
                $statement_sn .= $statement->id;

                $statement->statement_sn = $statement_sn;

                $statement->save();

                $success_array = array(
                    'status' => 'success',
                    'amount' => number_format($request->amount, 2),
                    'message' => Lang::get('messages.response.setting_success')
                );

                return response()->json($success_array);

            } else {

                $error_array = array(
                    'status' => 'error',
                    'message' => Lang::get('messages.response.invalid_param')
                );

                return response()->json($error_array);
            }

        } catch (\Exception $e) {

            $error_array = array(
                'status' => 'error',
                'message' => $e->getMessage(),
            );

            return response()->json($error_array);
        }

    }
}
