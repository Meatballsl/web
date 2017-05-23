<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;

use App\Models\Category;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;


class InfoController extends CommonController
{

    /**GET
     * info
     * 查看列表
     */
    public function index()
    {

       // return view('home.info.add',compact('data','status','check','users'));

    }

    /**GET
     *info/create
     * 创建
     */
    public function create()
    {
        $userid = session('user')->id;
        $check = '';
        $users = Users::getUserName();
        return view('home.info.add',compact('check','users'));
    }

    /**
     * POST
     * info
     * 添加
     */
    public function store(Request $request)
    {
        $input = $request->except('_token','avatar');

        $thumb = $this->upload($request);

        if(!$thumb){
            return back()->with("msg", "头像上传失败");
        }


        $userId = session('user')->id;

        $data = $input;
        $data['user_status'] = 2;
        $data['avatar'] = $thumb;
        $save = Users:: where('id',$userId)->update($data);

        if (!$save) {
            return back()->with("msg", "add error");
        }

        $user = Users::where('id',$userId)->first();
        session(['user'=>$user]);

        return redirect('home/person/'.session('user')->id);

    }


    /**
     * home/info/{cate}/edit
     * GET|HEAD
     * 修改(未用)
     */
    public function edit(Request $request, $id)
    {
        $field = Article::find($id);//前端无需遍历

        $data = Category::getCategory();
        $check = '';
        return view('home.article.edit', compact('field', 'data','check'));
    }

    /**
     * PUT|PATCH
     * home/info/{cate}
     * 更新（未用）
     * 前端： <input type="hidden" name="_method" value="put">
     */
    public function update(Request $request, $id)
    {
        $input = $request->except(['_method', '_token']);

        $result = Article::where('id', $id)->update($input);

        if ($result===false) {
            return back()->with('msg', 'update error');
        }

        return redirect('home/article');


    }


    /**
     * DELETE
     * home/info/{cate}
     * 删除（未用）
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
