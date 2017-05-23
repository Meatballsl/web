<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Topic extends Model
{
    protected $table = 'lsl_topic';

    public $guarded = ['_token'];

    public $fillable = ['name','content','status','created_at'];

    public $timestamps = false;

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(Users::class,'user_id');
    }

    public function follower()
    {
        return $this->hasMany(TopicFollower::class);
    }
}
