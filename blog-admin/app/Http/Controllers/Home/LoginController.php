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

    /**GET
     *login/create
     * 创建
     */
    public function create()
    {
        $data = Category::where('pid', 0)->get();
        return view('admin.category.add')->with('data', $data);

    }

    /**
     * POST
     * login
     * 添加
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $rule = [
            'name' => 'required',
        ];

        $message = [
            'name.required' => 'name not allow null'
        ];


        $validate = Validator::make($input, $rule, $message);

        if (!$validate->passes()) {
            return back()->withErrors($validate);

        }
        $add = Category::create($input);

        if (!$add) {
            return back()->with("msg", "add error");
        }
        return redirect('admin/cate');
    }


    public function code()
    {
        $code = new \Code();
        echo $code->make();

    }




}
