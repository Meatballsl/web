<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\Users;
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

        $data = Article::orderBy('id','desc')->paginate(10);

        $users = Users::getUserName();

        $status = ['0'=>'未审核','1'=>'审核中','审核通过'];

        return view('admin.article.index',compact('data','status','users'));

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


    public function verify(Request $request,$id)
    {

       $article = Article::find($id);

       $article->status = 2;
       $article->save();

       return back()->with('msg','审核成功');

     }

//评论管理
    public function comment(Request $request)
    {
        $comment = Comment::orderBy('id','desc')->paginate(10);
        $users = Users::getUserName();
        return view('admin.article.comment' ,compact('comment','users'));
     }

//评论删除
    public function commentDelete(Request $request,$id)
    {


        $deleteReply = Reply::where('comment_id',$id)->delete();
        $deleteComment = Comment::where('id',$id)->delete();

        if(!$deleteComment){
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


     //回复管理
    public function reply(Request $request)
    {

        $reply = Reply::orderBy('id','desc')->paginate(10);
        $users = Users::getUserName();
        return view('admin.article.reply' ,compact('reply','users'));

     }

//回复删除
    public function replyDelete(Request $request,$id)
    {


        $deleteReply = Reply::where('id',$id)->delete();


        if(!$deleteReply){
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
