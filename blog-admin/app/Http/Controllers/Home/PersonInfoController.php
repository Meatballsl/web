<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;

use App\Models\Category;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class PersonInfoController  extends CommonController
{

    /**GET
     * home/person
     * 查看列表
     */
    public function index(Request $request)
    {
        $check = 'info';
        $user = session('user');
        return view('home.person',compact('check','user'));

    }








}
