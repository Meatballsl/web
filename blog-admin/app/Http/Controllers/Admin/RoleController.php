<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\Users;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends CommonController
{
    /**GET
     * admin/role
     * 查看列表
     */
    public function index()
    {

        $role = Role::orderBy('id')->paginate(10);



        return view('admin.role.index',compact('role'));

    }

    /**GET
     *admin/article/create
     * 创建
     */
    public function create()
    {

        return view('admin.role.add');

    }

    /**
     * POST
     * admin/article
     * 添加
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $role = new Role;

        $add = $role->create($input);

        if (!$add) {
            return back()->with("msg", "add error");
        }
        return redirect('admin/role');

    }


    /**
     * admin/article/{cate}/edit
     * GET|HEAD
     * 修改(0)
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
     * 更新(0)
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

        $result = Role::where('id',$id)->delete();

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

    public function roleList()
    {
        $role = Role::all();
        return view('admin.role.list',compact('role'));

    }

    public function sumId(Request $request)
    {
        $input = $request->all();

        //$roleIds = json_encode($input['role_id']);
        if(empty($input['role_id'])){
            return back();
        }
        $roleIds = implode(',',$input['role_id']);

        return back()->with('roleIds',$roleIds);

    }

    //把用户加入该角色
    public function roleToUser(Request $request)
    {
        $input = $request->all();

        if(empty($input['role_id'])){
            return [
                'code'=>1,
                'msg'=>' error'
            ];
        }

        $user = User::where('id',$input['user_id'])->first();

        $role_id = explode(',',$input['role_id']);

        $result =  $user->roles()->sync($role_id,false);

        if(!$result){
            return [
                'code'=>1,
                'msg'=>' error'
            ];
        }
        return [
            'code'=>0,
            'msg'=>' success'
        ];

    }

//删除该用户对应的角色
    public function deleteUserRole(Request $request)
    {
        $input = $request->all();

        $user = User::where('id',$input['user_id'])->first();

        $role_id = $input['role_id'];

        $result =  $user->roles()->detach($role_id);

        if(!$result){
            return [
                'code'=>1,
                'msg'=>' error'
            ];
        }
        return [
            'code'=>0,
            'msg'=>' success'
        ];

    }


}
