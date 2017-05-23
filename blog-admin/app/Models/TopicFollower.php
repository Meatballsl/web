<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopicFollower extends Model
{
    protected $table = 'lsl_topic_follower';

    protected $guarded = ['_token'];

    protected $fillable = ['content','user_id','status'];


//    public $timestamps = false;

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function topicFollowerReply()
    {
        return $this->hasMany(TopicFollowerReply::class,'follower_id');

    }
}
