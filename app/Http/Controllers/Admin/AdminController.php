<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Admin;
use App\User;
use App\Models\Merchant;
use App\Models\Card;
use Session;
use Lang;
use Auth;

class AdminController extends Controller
{
    /* Redirect Default Route */
    public function index()
    {
        return redirect()->route('admin.dashboard');
    }

    /* Render Login Page */
    public function login()
    {
        $title = 'Login';
        return view('admin.auth.login')->withTitle($title);
    }

    /* Ajax Authenticate */
    public function authenticate(Request $request)
    {
        if(!empty($request->email) && !empty($request->password))
        {
            if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
            {
                $res = array (
                    'status' => 'success',
                    'message' => 'Login Success! Just a sec...'
                );
            } else {
                $res = array(
                    'status' => 'error',
                    'message' => 'Invalid Email or Password'
                );
            }
        } else {
            $res = array(
                'status' => 'error',
                'message' => 'Invalid Parameters'
            );
        }
        return response()->json($res);
    }

    /* Render Dashbord Page */
    public function dashboard()
    {
        $title = 'Dashboard';

        $cnt_users = User::count();
        $cnt_merchants = Merchant::count();
        $cnt_cards = Card::count();

        $data['cnt_users'] = $cnt_users;
        $data['cnt_merchants'] = $cnt_merchants;
        $data['cnt_cards'] = $cnt_cards;

        return view('admin.dashboard', $data)->withTitle($title);
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
