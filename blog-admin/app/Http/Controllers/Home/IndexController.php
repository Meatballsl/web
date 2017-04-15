<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

class IndexController extends CommonController
{
    public function index()
    {
        $check = 'index';
        return view('home.index',compact('check'));

    }

    public function category()
    {
        $check = 'cate';
        return view('home.category',compact('check'));

    }

    public function auther()
    {
        $check = 'auther';
        return view('home.auther',compact('check'));

    }

    public function classify()
    {
        return view('home.classify');

    }

    public function article()
    {
        return view('home.article');

    }

    public function blog()
    {
        $check = 'blog';
        return view('home.blog',compact('check'));

    }
}
