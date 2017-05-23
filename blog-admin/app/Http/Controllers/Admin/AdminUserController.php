<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\Users;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminUserController extends CommonController
{
    /**GET
     * admin/admin_user
     * 查看列表
     */
    public function index()
    {

        $user = User::orderBy('id')->paginate(10);



        return view('admin.adminuser.index',compact('user'));

    }

    /**GET
     *admin/article/create
     * 创建
     */
    public function create()
    {

        return view('admin.adminuser.add');

    }

    /**
     * POST
     * admin/article
     * 添加
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $user = new User;

        $input['password'] = bcrypt($input['password']);
        $add = $user->create($input);

        if (!$add) {
            return back()->with("msg", "add error");
        }
        return redirect('admin/admin_user');

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

        $result = User::where('id',$id)->delete();

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
