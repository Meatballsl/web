<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;

use App\Models\Category;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class CommentController extends CommonController
{

    public function store(Request $request)
    {
        $input = $request->all();

        $rule = [
            'content'=>'required|max:140'
        ];

        $validate = Validator::make($input,$rule);

        if(!$validate->passes()){
            return back()->withErrors($validate);
        }


        $articleId = $input['article_id'];

        $articel = Article::findOrFail($articleId);

        $result = $articel->comment()->create([
            'content'=>$input['content'],
            'user_id'=>$input['user_id'],
            'created_at'=>date('Y-m-d H:i:s',time()),
        ]);

        if(!$result){
            return back()->with('msg',"出现异常，请重试");
        }
        return back()->with('msg',"评论成功");

   }



}
