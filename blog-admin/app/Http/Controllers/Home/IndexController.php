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
        $cate = Category::where('pid',0)->orderby('id')->get();
        return view('home.category',compact('check','cateList','cateDetail','cate'));

    }

    public function auther()
    {
        $check = 'auther';
        return view('home.auther',compact('check'));

    }

    public function classify(Request $request,$id)
    {
        $cate = Category::where('pid',0)->orderby('id')->get();
        $cateDetail = Category::where('id',$id)->first();
        $article = Article::where(['status'=>2,'cid'=>$id])->paginate(15);
        $check = '';
        $user = Users::getUserName();
        return view('home.classify',compact('check','article','user','cateDetail','cate'));

    }

    public function article(Request $request,$id)
    {
        $cate = Category::where('pid',0)->orderby('id')->get();
        $check ='';
        $user = Users::getUserName();
        $article = Article::where('id',$id)->first();
        return view('home.article',compact('check','article','user','cate'));

    }

    public function blog()
    {
        $check = 'blog';
        return view('home.blog',compact('check'));

    }
}
