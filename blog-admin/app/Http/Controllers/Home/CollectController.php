<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;

use App\Models\Category;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class CollectController extends CommonController
{
    public function index(Request $request,$id)
    {
        $user = Users::find($id);

        $article = $user->article()->paginate(7);

        $user = Users::getUserName();
        $cate = Category::where('pid', 0)->orderby('id')->get();
        $check = '';
        return view('home.collect.collect',compact('article','user','cate','check'));

    }

    public function add(Request $request)
    {
        $input = $request->all();

         $user_id = session('user')->id;

         $art_id = $input['art_id'];

         $article = Article::find($art_id);

         $result = $article->user()->sync($user_id,false);

        if (!$result) {
            return [
                'code' => 1,
                'msg' => 'collect error'
            ];
        }
        return [
            'code' => 0,
            'msg' => 'collect success'
        ];

    }

    public function delete(Request $request)
    {

        $input = $request->all();

        $user_id = session('user')->id;

        $art_id = $input['art_id'];

        $article = Article::find($art_id);

        $result = $article->user()->detach($user_id);

        if (!$result) {
            return [
                'code' => 1,
                'msg' => 'de error'
            ];
        }
        return [
            'code' => 0,
            'msg' => 'de success'
        ];
    }


    public function recomment()
    {
        $userId = session('user')->id;

        $user = Users::find($userId);

        $article = $user->article->first();


        if($article){

            foreach ($user->article as $key=>$val){

                $otherUser = $val->user->where('id','!=',$userId)->first();

                if(!$otherUser) break;

                $art = $otherUser->article->where('id','!=',$val->id)->where('cid','=',$val->cid)->first();

                if(!$art) break;

                $recommentArt[$key] = $art;
            }
        }

        return  $recommentArt;
     }


}
