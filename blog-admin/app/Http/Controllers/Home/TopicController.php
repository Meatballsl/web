<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;

use App\Models\Category;
use App\Models\Follower;
use App\Models\Topic;
use App\Models\TopicFollower;
use App\Models\Users;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class TopicController extends CommonController
{

    /**GET
     * topic
     * 查看列表
     */
    public function index()
    {

        $check = 'topic';

        $topic = Topic::orderBy('created_at','desc')->paginate(7);
        $users = Users::getUserName();

        return view('home.topic.index', compact('check','topic','users'));

    }

    /**get
     * home/topic/{topic}
     */
    public function show(Request $request,$id)
    {
        $check = 'topic';

        $topic = Topic::find($id);
        $users = Users::getUserName();

        $follower = $topic->follower()->paginate(7);
        $users = Users::getUserName();


        return view('home.topic.show', compact('check','topic','users','follower','users'));
     }

    /**GET
     *article/create
     * 创建(0)
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

        $userId =  session('user')->id;

        $user = Users::find($userId);

        $input = $request->all();
        $input['created_at'] = date('Y-m-d H:i:s',time());
        $input['status'] = 1;

        $add = $user->topic()->create($input);


        if (!$add) {
            return back()->with("msg", "系统异常，请重试");
        }

        return back()->with("msg", "话题发表成功");

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
        $check = '';
        return view('home.article.edit', compact('field', 'data', 'check'));
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
     * 删除(0)
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

    public function followerAdd(Request $request,$id)
    {

        $input = $request->all();

        $topic = Topic::find($id);

        $input['user_id'] = session('user')->id;
        $input['status'] = 1;

        $add = $topic->follower()->create($input);

        if (!$add) {
            return back()->with("msg", "系统异常，请重试");
        }

        return back()->with("msg", "发表成功");


    }

    public function replyAdd(Request $request)
    {
        $input = $request->all();

        $follower = TopicFollower::find($input['follower_id']);


        $input['user_id'] = session('user')->id;
        $input['status'] = 1;

        $add = $follower->topicFollowerReply()->create($input);

        if (!$add) {
            return back()->with("msg", "系统异常，请重试");
        }

        return back()->with("msg", "评论成功");
    }





}
