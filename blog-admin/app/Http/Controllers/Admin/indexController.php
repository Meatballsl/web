<?php
namespace App\Http\Controllers\Admin;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;


Class IndexController extends CommonController{

    public function index()
    {
      return  view('admin.index');
    }

    public function info()
    {
       // var_dump($_SERVER);
        return view('admin.info');
    }

    //后台退出
    public function quit()
    {
        session(['user'=>null]);
        return redirect('admin/login');

    }

    //修改密码
    public function pass(Request $request)
    {
        if($input = $request->all()){
            $rules = [
                'password'=>'required|between:6,20|confirmed'
            ];

            $message = [
                'password.required'=>'password not allow null',
                'password.between'=>'password number wrong',
                'password.confirmed'=>'not match'
            ];

            $validate = Validator::make($input,$rules,$message);

            if(!$validate->passes()){

                return back()->withErrors($validate);
            }

            $user = Users::find(1);

            $pass = Crypt::decrypt($user->user_pass);

            if($input['password_o']!=$pass){

                $validate->errors()->add('password_o','old password wrong');
                return back()->withErrors($validate);

            }

            $user->user_pass = Crypt::encrypt($input['password']);
            $user->save();
            return back()->with('success','change password success');

        }



        //Validator::make()
        return view('admin.pass');

    }


}