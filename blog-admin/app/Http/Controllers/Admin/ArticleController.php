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
        $data = Article::orderBy('id')->paginate(15);

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

        $input['auther'] = session('user')->id;
        $input['status'] = 0;
        $add = Article::create($input);

        if (!$add) {
            return back()->with("msg", "add error");
        }
        return redirect('admin/article');

    }


    /**
     * admin/article/{cate}/edit
     * GET|HEAD
     * 修改
     */
    public function edit(Request $request, $id)
    {
        $field = Article::find($id);//前端无需遍历

        $data = Category::getCategory();
        return view('admin.article.edit', compact('field', 'data'));
    }

    /**
     * PUT|PATCH
     * admin/article/{cate}
     * 更新
     * 前端： <input type="hidden" name="_method" value="put">
     */
    public function update(Request $request, $id)
    {
        $input = $request->except(['_method', '_token']);

        $result = Article::where('id', $id)->update($input);

        if ($result===false) {
            return back()->with('msg', 'update error');
        }

        return redirect('admin/article');


    }


    /**
     * DELETE
     * admin/article/{cate}
     * 删除
     */
    public function destroy(Request $request, $id)
    {

        $result = Article::where('id',$id)->delete();

        if(!$result){
            return [
                'code'=>1,
                'msg'=>'delete error'
            ];
        }
        return [
            'code'=>0,
            'msg'=>'delete success'
        ];
    }



}
