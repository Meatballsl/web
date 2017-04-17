<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;

use App\Models\Users;
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
        $article = Article::where('status',2)->paginate(1);
        $check = '';
        $user = Users::all();
        return view('home.classify',compact('check','article','user'));

    }

    public function article(Request $request,$id)
    {
        $check ='';
        $article = Article::where('id',$id)->first();
        return view('home.article',compact('check','article'));

    }

    public function blog()
    {
        $check = 'blog';
        return view('home.blog',compact('check'));

    }
}
