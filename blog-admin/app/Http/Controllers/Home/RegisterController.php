<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;

use App\Models\Category;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class RegisterController extends CommonController
{
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

            $exist = Users::where('user_email',$input['user_email'])->orWhere('user_login',$input['user_login'])->first();

            if($exist){
                $validate->errors()->add('msg','该邮箱已经被注册过或该用户名已存在');
                return back()->withErrors($validate);
            }
            $user = new Users();
            $user->user_login = $input['user_login'];
            $user->user_email = $input['user_email'];
            $user->user_pass = Crypt::encrypt($input['password']);
            $user->user_type = 2;
            $result = $user->save();

            if(!$result){
                $validate->errors()->add('msg','注册失败，请重试');
                return back()->withErrors($validate);

            }

            session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');
            session(['user'=>$user]);
            return redirect('info');


        }
    }





}
