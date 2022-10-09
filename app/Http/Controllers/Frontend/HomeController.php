<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Post;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductReview;
use Illuminate\Support\Facades\DB;
use Lang;

class HomeController extends Controller
{
    /* Render Home Page */
    public function home()
    {
        $title = 'Home';
        $data = array();
        return view('user.index', $data)->withTitle($title);
    }
}
