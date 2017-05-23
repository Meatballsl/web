<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Message;
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



    }

    /**GET
     * message/2
     * 查看列表()
     */
    public function show(Request $request,$id)
    {
        $users = Users::getUserName();

        $userId = $id;
        $user = Users::find($userId);

        $message = $user->message()->paginate(7);




        return view('home.message.index',compact('users','user','message'));

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
     * 添加()
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $input['follower_id'] = session('user')->id;
        $input['status'] = 1;
        $input['created_at'] = date('Y-m-d H:i:s',time());

        $user =  Users::find($input['user_id']);
        $add = $user->message()->create($input);

        if (!$add) {
            return back()->with("msg", "系统异常，请稍后再试");
        }

        return back()->with("msg", "留言成功");



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


    public function reply(Request $request)
    {
        $input = $request->all();

        $message = Message::find($input['message_id']);
        $input['created_at'] = date("Y-m-d H:i:s",time());

        $result = $message->messageReply()->create($input);

        if(!$result) {
            return back()->with('msg', " 系统异常，请重试");
        }

        return back()->with('msg',"评论成功");


     }

    public function delete(Request $request)
    {
        $input = $request->all();


        $result = Message::where('id',$input['id'])->delete();

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

    public function replyDelete()
    {

     }


}
