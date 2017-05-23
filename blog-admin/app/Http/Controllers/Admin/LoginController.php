<?php
namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Auth;

require_once "resources/org/code/Code.class.php";
Class LoginController extends CommonController{

    //显示code、用户输入的code和session中的code作比较，一样则通过，不一样，返回验证码错误

    public function login(Request $request)
    {
        if($input = $request->all()){

            $realCode =$_SESSION['code'];

            if(strtoupper($input['code'])!=$realCode){

                return back()->with('msg','验证码错误');
            }

           // $user = User::find(1);

//            if($user['name']!=$input['username']||Crypt::decrypt($user['password'])!=$input['password']){
//                return back()->with('msg','账号或密码错误');
//            }



            $credentials = [
                'name'    => $input['username'],
                'password' => $input['password'],
            ];

            if (Auth::attempt($credentials)){
                session(['user'=>Auth::user()]);
                return redirect('admin/index');
            }else{
                return back()->with('msg','账号或密码错误');
            }



        }else{
            return view('admin.login');
        }

    }

    public function code()
    {
        $code = new \Code();
        echo $code->make();

    }



//    public function crypt()
//    {
//        $en = Crypt::encrypt(encrypt("123456"));//eyJpdiI6InhlMEJiNFhBWW1ibVVhTVgxeFwvWWl3PT0iLCJ2YWx1ZSI6IitaOHFicTdkMmdyNGp0bDVzNkNPUGc9PSIsIm1hYyI6IjY4Y2YxNTIxM2NiNjIyNWQ3MjMxMTUyYTQ3OWQyMTZiMzdhZDMzNGM1YTIwZGIwMmI2ZWM3NzgxMjQ1Y2ExMmEifQ==
//
//        $de = Crypt::decrypt(decrypt($en));
//        echo $de;
//
//    }

//    public function getcode(){
//        return $_SESSION['code'];
//    }
}