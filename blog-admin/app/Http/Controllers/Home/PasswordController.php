<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;

use App\Models\Category;
use App\Models\Reset;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;


class PasswordController extends CommonController
{

    public function getEmail(Request $request)
    {
        $check = '';
        return view("home.reset.password", compact('check'));


    }

    //接收邮箱。生成token，存入数据库, 发送邮箱
    public function postEmail(Request $request)
    {
        $email = $request->input('user_email');

        $exist = Users::where('user_email', $email)->first();

        if (!$exist) {
            return back()->with('msg', " 该邮箱未激活");
        }

        $reset = new Reset;

        $reset->email = $email;
        $reset->token = str_random(10) . time();
        $reset->created_at = date('Y-m-d H:i:s', time());

        $result = $reset->save();

        if (!$result) {
            return back()->with('msg', "异常，请重新输入邮箱");
        }

        $user = $reset;
        $view = 'home.reset.confirm';

        $subject = " UknowBlog密码重置";

        $this->sendEmailConfirmationTo($view, $user, 'email', $subject);

        return back()->with('msg', "重置密码邮件已发送到此邮箱上，请注意查收");

    }

    public function getReset(Request $request, $token)
    {
        $check = '';
        return view("home.reset.reset", compact('check', 'token'));


    }

    //判断密码有无一致，令牌一致，如一致，更改密码
    public function postReset(Request $request)
    {
        $input = $request->all();

        if ($input['password'] !== $input['password_confirmation']) {
            return back()->with('msg', '密码不一致');
        }

        $reset = Reset::where([
            ['email', '=', $input['email']],
            ['token', '=', $input['token']]
        ])->first();

        if (!$reset) {
            return back()->with('msg', '出现异常，请重试');
        }

        $user = Users::where([
            ['user_email', '=', $input['email']]
        ])->first();

        $newPassword = Crypt::encrypt($input['password']);
        $user->user_pass = $newPassword;
        $resultUser = $user->save();


        $reset->token = null;
        $resultReset = $reset->save();

        if (!$resultUser || !$resultReset) {
            return back()->with('msg', '密码更新失败，请重试');
        }


        return back()->with('msg', '更新成功');

    }


}
