<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageReply extends Model
{
    protected $table = 'lsl_message_reply';

    protected $fillable = ['content','user_id','created_at'];

    public $timestamps = false;

    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
