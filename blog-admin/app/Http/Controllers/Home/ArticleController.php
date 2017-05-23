<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;

use App\Models\Category;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class ArticleController extends CommonController
{

    /**GET
     * article
     * 查看列表
     */
    public function index()
    {
        $userid = session('user')->id;
        $data = Article::where('auther', $userid)->orderBy('id')->paginate(10);

        $status = ['0' => '未审核', '1' => '审核中', '审核通过'];
        $yesOr = ['1'=>'是','0'=>'否'];
        $users = Users::getUserName();
        $check = '';


        return view('home.article.index', compact('data', 'status', 'check', 'users','yesOr'));

    }

    /**GET
     *article/create
     * 创建
     */
    public function create()
    {
        $check = '';
        $data = Category::getCategory();
        return view('home.article.add', compact('check', 'data'));

    }

    /**
     * POST
     * article
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

        if($input['is_top']==1){
            Article::where('is_top',1)->update(['is_top'=>0]);
        }

        $input['auther'] = session('user')->id;
        $input['status'] = 0;
        $add = Article::create($input);

        if (!$add) {
            return back()->with("msg", "add error");
        }
        return redirect('home/article');

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
        $check = '';
        return view('home.article.edit', compact('field', 'data', 'check'));
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

        $userId = session('user')->id;
        if($input['is_top']==1){
            Article::where('is_top',1)->where('auther',$userId)->update(['is_top'=>0]);
        }
        $result = Article::where('id', $id)->update($input);

        if ($result === false) {
            return back()->with('msg', 'update error');
        }

        return redirect('home/article');


    }


    /**
     * DELETE
     * admin/article/{cate}
     * 删除
     */
    public function destroy(Request $request, $id)
    {

        $result = Article::where('id', $id)->delete();

        if (!$result) {
            return [
                'code' => 1,
                'msg' => 'delete error'
            ];
        }
        return [
            'code' => 0,
            'msg' => 'delete success'
        ];
    }



}
