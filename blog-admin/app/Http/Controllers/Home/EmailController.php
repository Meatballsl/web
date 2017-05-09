<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;

use App\Models\Category;
use App\Models\Users;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class EmailController extends CommonController
{
    /**GET
     * home/email
     * 查看列表
     */
    public function index(Request $request)
    {
        if ($input = $request->all()) {

            $userId = session('user')->id;

            $userEmail = $input['user_email'];

            $exist = Users::where([
                ['user_email', "=", $input['user_email']],
                ['id', '<>', $userId],
            ])->first();
            if ($exist) {
                return back()->with('msg', "该邮箱已经存在，请重新输入");
            }

            $sameEmail = Users::where([
                ['id', '=', $userId],
                ['user_email', '=', $input['user_email']]
            ])->first();

            if (!$sameEmail) {
                $updateEmail = Users::where('id', $userId)->update(['user_email' => $userEmail]);

                if (!$updateEmail) {
                    return back()->with('msg', "邮箱更新失败");
                }
            }


            $activation_token = str_random(10) . time();

            $addToken = Users::where('id', $userId)->update(['activation_token' => $activation_token]);

            if (!$addToken) {
                return back()->with('msg', "token保存失败");
            }

            $user = Users::where('id', $userId)->first();

            $view = 'home.email.confirm';
            $subject = "感谢注册Uknow Blog应用！请确认你的邮箱。";

            $this->sendEmailConfirmationTo($view, $user, 'user_email', $subject);

            session()->flash('msg', '验证邮件已发送到你的注册邮箱上，请注意查收。');

            return redirect("home/emailSend");


        } else {
            $check = 'email';
            $user = session('user');
            return view('home.email.email', compact('check', 'user'));
        }


    }


    public function emailSend()
    {
        $check = '';
        return view('home.email.emailSend', compact('check'));

    }

    public function confirmEmail(Request $request, $token)
    {
        $user = Users::where('activation_token', $token)->firstOrFail();

        $user->activated = "1";
        $user->activation_token = "null";
        $user->user_status = 3;
        $user->save();

        session()->flash('success', ' 邮箱激活成功');
        return redirect('home/emailSend');


    }


}
