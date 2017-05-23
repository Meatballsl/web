<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Message extends Model
{
    protected $table = 'lsl_message';

    public $guarded = ['_token'];

    public $fillable = ['follower_id','content','status','created_at'];

    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo(Users::class,'user_id');

    }

    public function messageReply()
    {
        return $this->hasMany(MessageReply::class);
    }



}
