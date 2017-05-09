<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
class MessageController extends CommonController
{

    /**GET
     * message
     * 查看列表(no)
     */
    public function index()
    {

        $users = Users::getUserName();



        return view('home.message.index');

    }

    /**GET
     *message/create
     * 创建(no)
     */
    public function create()
    {
        $check = '';
        $data = Category::getCategory();
        return view('home.article.add', compact('check', 'data'));

    }

    /**
     * POST
     * message
     * 添加(no)
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
     * home/message/{cate}/edit
     * GET|HEAD
     * 修改(no)
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
     * home/message/{cate}
     * 更新
     * 前端： <input type="hidden" name="_method" value="put"> {{ method_field('DELETE') }}
     */
    public function update(Request $request, $id)
    {
        $input = $request->except(['_method', '_token']);

        if($input['is_top']==1){
            Article::where('is_top',1)->update(['is_top'=>0]);
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
