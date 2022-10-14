<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /* Render Home Page */
    public function index()
    {
        $title = 'Home';
        $data = array();
        return view('user.index', $data)->withTitle($title);
    }
}
