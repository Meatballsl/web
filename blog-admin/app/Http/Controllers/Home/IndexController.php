<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;

use App\Models\Category;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

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

    public function register()
    {
        $check = '';
        return view('home.register',compact('check'));

    }

    public function registerPost(Request $request)
    {
        $input = $request->except('_token');

        if($input){
            $rules = [
                'user_login'=>'required',
                'user_email'=>'required|email',
                'password'=>'required|between:6,20|confirmed',

            ];
            $msg = [
                'user_login.required'=>'用户名非空',
                'user_email.required'=>'邮箱非空',
                'user_email.email'=>'邮箱格式错误',
                'password.required'=>'密码非空' ,
                'password.between'=>'密码长度为6-20为',
                'password.confirmed'=>'两个密码不一致'
            ];

            $validate = Validator::make($input,$rules,$msg);

            if(!$validate->passes()){
                return back()->withErrors($validate);
            }

            $exist = Users::where('user_email',$input['user_email'])->first();

            if($exist){
                $validate->errors()->add('msg','该邮箱已经被注册过');
                return back()->withErrors($validate);
            }
            $user = new Users();
            $user->user_login = $input['user_login'];
            $user->user_email = $input['user_email'];
            $user->user_pass = Crypt::encrypt($input['password']);
            $user->user_type = 2;
            $result = $user->save();

            if(!$result){
                $validate->errors()->add('msg','该邮箱已经被注册过');
                return back()->withErrors($validate);
                return back()->with('success','注册成功');
            }


        }
    }
}
