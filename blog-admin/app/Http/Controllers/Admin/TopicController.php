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

class TopicController extends CommonController
{

    //话题管理
    public function topic(Request $request)
    {
        $topic = Topic::orderBy('id','desc')->paginate(10);
        $users = Users::getUserName();
        return view('admin.topic.topic' ,compact('topic','users'));
    }

    //话题删除
    public function topicDelete(Request $request,$id)
    {
        //找出所有跟帖、删除跟帖的所有评论、删除所有跟帖、删除话题

        $followerIds = $this->findIds($id);

        TopicFollowerReply::whereIn('follower_id',$followerIds)->delete();

        TopicFollower::where('topic_id',$id)->delete();

        $deleteReply = Topic::where('id',$id)->delete();


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

    //找出该话题的跟题的所有id
    public function findIds($id=1)
    {
        $followers = TopicFollower::where('topic_id',$id)->get(['id'])->toArray();

        $idsArr = array_column($followers,'id');

        return $idsArr;

      //  TopicFollowerReply::whereIn('follower_id',$idsArr)->delete();


    }


//
//跟帖管理
    public function follower(Request $request)
    {
        $follower = TopicFollower::orderBy('id','desc')->paginate(10);
        $users = Users::getUserName();
        return view('admin.topic.follower' ,compact('follower','users'));
     }

//评论删除
    public function followerDelete(Request $request,$id)
    {
//  先删除评论，再删除跟帖

        $deleteReply = TopicFollowerReply::where('follower_id',$id)->delete();
        $deleteFollower = TopicFollower::where('id',$id)->delete();

        if(!$deleteFollower){
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


     //回复跟帖管理
    public function followerComment(Request $request)
    {

        $followerComment = TopicFollowerReply::orderBy('id','desc')->paginate(10);
        $users = Users::getUserName();
        return view('admin.topic.followerComment' ,compact('followerComment','users'));

     }

//回复删除
    public function followerCommentDelete(Request $request,$id)
    {


        $deleteReply = TopicFollowerReply::where('id',$id)->delete();


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
