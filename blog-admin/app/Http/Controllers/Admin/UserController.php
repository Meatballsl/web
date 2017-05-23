<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Follower;
use App\Models\Reply;
use App\Models\Topic;
use App\Models\TopicFollower;
use App\Models\TopicFollowerReply;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends CommonController
{

    //会员管理
    public function user(Request $request)
    {
        $user = Users::paginate(10);

        return view('admin.user.user' ,compact('user'));
    }

    //会员删除
    public function UserDelete(Request $request,$id)
    {

        $deleteUser = Users::where('id',$id)->delete();

        if(!$deleteUser){
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

    //会员等级修改
    public function updateStatus(Request $request)
    {
        $input = $request->all();
        $user = Users::find($input['user_id']);
        $user->user_status = $input['user_status'];
        $result = $user->save();

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

    //作家专栏审核
    public function column_vefify()
    {
        $user = Users::orderBy('is_column','desc')->paginate(10);
        $column = ['2'=>"未审核",'1'=>'已审核' ,'0'=>'无资格'];

        return view('admin.user.column' ,compact('user','column'));

    }

    public function column_pass(Request $request)
    {
        $input = $request->all();
        $user = Users::find($input['user_id']);
        $user->is_column = 1;
        $result = $user->save();

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

    public function column_delete(Request $request)
    {
        $input = $request->all();
        $user = Users::find($input['user_id']);
        $user->is_column = 0;
        $result = $user->save();

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
