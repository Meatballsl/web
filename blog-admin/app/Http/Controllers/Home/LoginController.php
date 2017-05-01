<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;

use App\Models\Category;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class LoginController extends CommonController
{


    /**GET
     * login
     * 查看列表
     */
    public function index()
    {
        $check = '';

        return view('home.login',compact('check'));

    }


    /**
     * POST
     * login
     * 添加
     */
    public function store(Request $request)
    {
        if($input = $request->all()){


            $user = Users::where('user_login',$input['user_login'])->first();

            if(!$user){
                return back()->with('msg','账号不存在');
            }

            if($input['password']!==Crypt::decrypt($user['user_pass'])){
                return back()->with('msg',' 密码错误');
            }

            session(['user'=>$user]);
            session()->flash('success', '欢迎'.$user['user_login'].'，登陆成功');
            return redirect('index');

        }
    }


    public function code()
    {
        $code = new \Code();
        echo $code->make();

    }




}
