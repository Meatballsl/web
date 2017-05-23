<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopicFollowerReply extends Model
{
    protected $table = 'lsl_topic_follower_reply';

    protected $fillable = ['content','user_id','status'];

    //public $timestamps = false;

    public function topicFollower()
    {
        return $this->belongsTo(TopicFollower::class,'follower_id');
    }
}
