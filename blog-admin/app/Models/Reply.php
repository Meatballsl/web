<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'lsl_reply';

    protected $fillable = ['content','user_id','created_at'];

    public $timestamps = false;

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
