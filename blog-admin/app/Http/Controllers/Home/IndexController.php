<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

class IndexController extends CommonController
{
    public function index()
    {
        return view('home.index');

    }

    public function category()
    {
        return view('home.category');

    }

    public function auther()
    {
        return view('home.auther');

    }
}
