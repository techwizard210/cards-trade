<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use Mail;
use Lang;
use DB;

class EmailController extends Controller
{
    /* Send Forgot Password Email */
    public function forgot_password($email, $token)
    {
        try {
            $user = DB::table('users')->where('email', $email)->select('name', 'email')->first();

            $data['link'] = config('base_url') .'/'. app()->getLocale().'/password/reset/'. $token . '?email=' . urlencode($user->email);
            $data['user_email'] = $user->email;
            $data['user_name'] = $user->first_name.' '.$user->last_name;
            $data['subject'] = Lang::get('title.forgot_password');

            Mail::send('mail.password_reset', $data, function ($message) use ($data) {
                $message->to( $data['user_email'], $data['user_name'])->subject($data['subject']);
                $message->from( env('MAIL_USERNAME'),'Elegance');
            });

            return true;

        } catch (\Exception $e) {
            dd($e);die;
            return false;
        }
    }

    /* Send Verification Email */
    public function emailVerification($email, $token)
    {
        try {

            $data['link'] = config('app.url') .'/verification/'. $token . '?email=' . urlencode($email);
            $data['subject'] = 'Email Verification';
            $data['user_email'] = $email;

            Mail::send('mail.email_verify', $data, function ($message) use ($data) {
                $message->to($data['user_email'])->subject($data['subject']);
                $message->from(env('MAIL_USERNAME'),'CardsTrade');
            });

            return true;

        } catch (\Exception $e) {
            return false;
        }
    }
}
