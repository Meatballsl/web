<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
class ReplyController extends CommonController
{

    public function replayToComment(Request $request)
    {

        $input = $request->all();
        $comment = Comment::find($input['comment_id']);
        $result = $comment->reply()->create([
            'content'=>$input['content'],
            'user_id'=>$input['user_id'],
            'created_at'=>date('Y-m-d H:i:s')
        ]);


        return $result;

   }



}
