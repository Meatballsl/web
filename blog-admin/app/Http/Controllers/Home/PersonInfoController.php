<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;

use App\Models\Category;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class PersonInfoController extends CommonController
{

    /**GET
     * home/person
     * 查看列表
     */
    public function index(Request $request, $userId)
    {
        $check = 'info';

        $user = Users::where('id', $userId)->first();
        $myUser = Users::where('id',session('user')->id)->first();
        $topArticle = Article::where([
            ['auther','=',$userId],
            ['is_top','=',1],
            ['status','=',2]
        ])->orderBy('created_at','desc')->first();
        return view('home.person.person', compact('check', 'user','myUser','topArticle'));

    }

    /**
     * home/users/{id}/followings
     * 获取关注人
     */
    public function followings(Request $request, $id)
    {
        $user = Users::findOrFail($id);

        $users = $user->followings()->get();

        $myUser = Users::where('id',session('user')->id)->first();

        $title = '关注列表';

        $check = '';

        return view("home.person.user", compact('user', 'users','title', 'check','myUser'));


    }

    /**
     * home/users/{id}/followers
     * 获取粉丝
     */
    public function followers(Request $request, $id)
    {
        $user = Users::findOrFail($id);

        $users = $user->followers()->paginate(10);

        $title = ' 粉丝列表';

        $check = '';

        $myUser = Users::where('id',session('user')->id)->first();

        return view("home.person.user", compact('users','user', 'title', 'check','myUser'));


    }

    /**
     *
     * 关注
     */
    public function store(Request $request, $id)
    {

        $myId = session('user')->id;

        $user = Users::findOrFail($myId);

        if($myId===$id){
            return redirect('/');
        }

        if ($user->isFollowing($id)) {
            return redirect('/');
        }

        if (!$user->follow($id)) {
            return back()->with('msg', ' 关注失败');
        }

        return back()->with('msg', ' 关注成功');

    }

    /**
     * @param Request $request
     * @param $id
     * 取消关注
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        $myId = session('user')->id;

        $user = Users::findOrFail($myId);


        if (!$user->unfollow($id)) {
            return back()->with('msg', '取消关注失败');
        }

        return back()->with('msg', ' 取消关注成功');
    }


}
