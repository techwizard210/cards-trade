<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Admin;
use App\User;
use Session;
use Lang;
use Auth;

class AdminController extends Controller
{

    /* Render Login Page */
    public function login()
    {
        $title = Lang::get('title.login');
        return view('backend.auth.login')->withTitle($title);
    }

    /* Ajax Authenticate */
    public function authenticate(Request $request)
    {
        if(!empty($request->email) && !empty($request->password))
        {
            $email = Admin::where('email', $request->email)->first();

            if(!empty($email))
            {
                $status = Admin::where(['email' => $request->email, 'status' => 'active'])->first();

                if(!empty($status))
                {
                    if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
                    {
                        if($request->redirect_url) {
                            return redirect($request->redirect_url);
                        } else {
                            return redirect()->intended('/admin/dashboard');
                        }
                    } else {
                        return back()->withErrors(Lang::get('message.response.invalid_login'))->withInput();
                    }
                } else {
                    return back()->withErrors(Lang::get('message.response.inactive_user'))->withInput();
                }
            } else {
                return back()->withErrors(Lang::get('message.response.invalid_login'))->withInput();
            }
        } else {
            return back()->withErrors(Lang::get('message.response.required_fields'))->withInput();
        }

    }

    /* Render Dashbord Page */
    public function dashboard()
    {
        $title = Lang::get('title.dashboard');
        $data = User::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->groupBy('day_name','day')
            ->orderBy('day')
            ->get();

        $array[] = ['Name', 'Number'];

        foreach($data as $key => $value)
        {
           $array[++$key] = [$value->day_name, $value->count];
        }

        return view('backend.dashboard', $data)->withTitle($title);
    }

    /**
     * Admin Locale Switch
     */
    public function switch_locale($lang)
    {
        \Session::put('locale', $lang);

        return redirect()->back();
    }

    /**
     * Admin Logout
     */
    public function logout()
    {
        Session::flush();
        Auth::guard('admin')->logout();

        return redirect('admin/login');
    }
}
