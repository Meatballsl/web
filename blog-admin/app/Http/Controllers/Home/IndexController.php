<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;

use App\Models\Category;
use App\Models\Users;
use Illuminate\Http\Request;

class IndexController extends CommonController
{
    public function index()
    {
        $check = 'index';
        $cate = Category::where('pid',0)->orderby('id')->get();
        return view('home.index',compact('check','cate'));

    }

    public function category(Request $request,$id)
    {
        $cateDetail = Category::where('id',$id)->first();
        $cateList = Category::where('pid',$id)->get();
        $check = 'cate';
        return view('home.category',compact('check','cateList','cateDetail'));

    }

    public function auther()
    {
        $check = 'auther';
        return view('home.auther',compact('check'));

    }

    public function classify(Request $request,$id)
    {
        $cateDetail = Category::where('id',$id)->first();
        $article = Article::where(['status'=>2,'cid'=>$id])->paginate(15);
        $check = '';
        $user = Users::getUserName();
        return view('home.classify',compact('check','article','user','cateDetail'));

    }

    public function article(Request $request,$id)
    {
        $check ='';
        $user = Users::getUserName();
        $article = Article::where('id',$id)->first();
        return view('home.article',compact('check','article','user'));

    }

    public function blog()
    {
        $check = 'blog';
        return view('home.blog',compact('check'));

    }
}
