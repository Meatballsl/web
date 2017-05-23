<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class IndexController extends CommonController
{
    public function index()
    {
        $check = 'index';
        $cate = Category::where('pid', 0)->orderby('id')->get();

        if(empty(session('user'))){
            $recomment = Article::where('status',2)->where('is_public',1)->orderBy('created_at','desc')->take(4)->get();
        }
        else{

            $recomment = $this->totalRecommet();

        }

        return view('home.index', compact('check', 'cate','recomment'));

    }

    public function category(Request $request, $id)
    {
        $cateDetail = Category::where('id', $id)->first();
        $cateList = Category::where('pid', $id)->get();
        $check = 'cate';
        $cate = Category::where('pid', 0)->orderby('id')->get();
        return view('home.category', compact('check', 'cateList', 'cateDetail', 'cate'));

    }

    public function auther()
    {
        $check = 'auther';
        $authers = Users::where('is_column', 1)->get();


        return view('home.auther', compact('check', 'authers'));

    }

    public function classify(Request $request, $id)
    {
        $cate = Category::where('pid', 0)->orderby('id')->get();
        $cateDetail = Category::where('id', $id)->first();
        $article = Article::where(['status' => 2, 'cid' => $id])->paginate(15);
        $check = '';
        $user = Users::getUserName();
        return view('home.classify', compact('check', 'article', 'user', 'cateDetail', 'cate'));

    }

    public function article(Request $request, $id)
    {
        $cate = Category::where('pid', 0)->orderby('id')->get();
        $check = '';
        $user = Users::getUserName();
        $article = Article::where('id', $id)->first();
        $comment = $article->comment()->get();

        if(empty(session('user'))){
            $collect = 0;
        }
        else{
            if($article->user->contains(session('user')->id)){
                $collect = 1;
            }
            else{
                $collect = 0;
            }
        }



        return view('home.article', compact('check', 'article', 'user', 'cate','comment','collect'));

    }

    public function blog(Request $request, $check, $userid)
    {


        $user = Users::where('id', $userid)->first();
        $article = Article::where([
            ['auther', '=', $userid],
            ['status', '=', 2],
        ])->paginate(10);
        $cate = Category::where('pid', 0)->orderby('id')->get();
        $users = Users::getUserName();

        return view('home.blog', compact('check', 'user', 'cate', 'article', 'users'));

    }

    //退出
    public function quit()
    {
        session(['user' => null]);
        return redirect('index');

    }


    public function totalRecommet()
    {
        $recommentOriginal = $this->recomment();

        $recommentNum = count($recommentOriginal);


        if($recommentNum==0) {
            $recomment = Article::where('status',2)->where('is_public',1)->orderBy('created_at','desc')->take(4)->get();

        }
        else if($recommentNum<4){

            $recommentAdd = $recomment = Article::where('status',2)->where('is_public',1)->orderBy('created_at','desc')->take(4-$recommentNum)->get();

            $recommentAdd = $recommentAdd->toArray();

            $recomment = array_merge($recommentOriginal,$recommentAdd);

            }

        else if($recommentNum===4){
            $recomment = $recommentOriginal;
        }

        else if($recommentNum){
            $recomment = $recommentOriginal->take(4)->get();
        }

        return $recomment;
    }


    //搜索
    public function search(Request $request)
    {

        $input = $request->all();

        $search = $input['search'];

        $article = Article::where('title','like','%'.$search.'%')->where('status','2')->where('is_public',1)->paginate(7);

        $user = Users::getUserName();
        $cate = Category::where('pid', 0)->orderby('id')->get();
        $check = '';
        return view('home.search',compact('article','user','cate','check'));
    }

    //专栏申请（0：无权限。1：有权限。2：正在审核）
    public function column()
    {
        $userId = session('user')->id;

        $user = Users::find($userId);

        $user->is_column = 2;

        $user->save();

        session(['user'=>$user]);

    }
}
