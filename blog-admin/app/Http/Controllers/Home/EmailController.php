<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;

use App\Models\Category;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class EmailController extends CommonController
{

    /**GET
     * home/email
     * 查看列表
     */
    public function index(Request $request)
    {
        if($input = $request->all()){
            $exist = Users::where('user_email',$input['user_email'])->first();
            if($exist){
                return back()->with('msg',"该邮箱已经存在，请重新输入");
            }
        }else{
            $check = 'email';
            $user = session('user');
            return view('home.email',compact('check','user'));
        }


    }








}
