<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends CommonController
{
    /**GET
     * admin/article
     * 查看列表
     */
    public function index()
    {
        $data = Article::orderBy('id')->paginate(1);

        $status = ['0'=>'未审核','1'=>'审核中','审核通过'];

        return view('admin.article.index',compact('data','status'));

    }

    /**GET
     *admin/article/create
     * 创建
     */
    public function create()
    {
        $data = Category::getCategory();
        return view('admin.article.add')->with('data', $data);

    }

    /**
     * POST
     * admin/article
     * 添加
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $rule = [
            'title' => 'required',
        ];

        $message = [
            'title.required' => 'title not allow null'
        ];

        $validate = Validator::make($input, $rule, $message);

        if (!$validate->passes()) {
            return back()->withErrors($validate);

        }
        $add = Article::create($input);

        if (!$add) {
            return back()->with("msg", "add error");
        }
        return redirect('admin/article');

    }


}
