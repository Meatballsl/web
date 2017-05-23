<?php
namespace App\Models;

use App\Http\Controllers\Home\TopicController;
use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Users extends Model
{
    protected $table = 'lsl_user';

    public $timestamps = false;

    use EntrustUserTrait;

    public static function getUserName()
    {
        $users = self::all();

        $id = [];
        $name = [];
        if ($users) {
            foreach ($users as $key => $val) {
                $id[$key] = $val['id'];
                if(isset($val['user_nicename'])){
                    $name[$key]['user_name'] = $val['user_nicename'];
                }else{
                    $name[$key]['user_name'] = $val['user_login'];
                }

                $name[$key]['avatar'] = $val['avatar'];

            }

        }

        $userName = array_combine($id, $name);

        return $userName;

    }

    //返回粉丝列表
    public function followers()
    {
        return $this->belongsToMany(Users::Class,"lsl_followers",'user_id','follower_id');
    }


    //返回关注列表
    public function followings()
    {
        return $this->belongsToMany(Users::Class,"lsl_followers",'follower_id','user_id');
    }


    //关注
    public function follow($user_ids)
    {
        if(!is_array($user_ids)){
            $user_ids = compact('user_ids');
        }

       return $this->followings()->sync($user_ids,false);


    }

    //取消关注
    public function unfollow($user_ids)
    {
        if(!is_array($user_ids)){
            $user_ids = compact('user_ids');
        }

       return $this->followings()->detach($user_ids);
    }

    //判断当前用户是否关注了user_id
    public function isFollowing($user_id)
    {
        return $this->followings->contains($user_id);
    }

    public function message()
    {
        return $this->hasMany(Message::class,'user_id');
     }


    public function topic()
    {
        return $this->hasMany(Topic::class,'user_id');

     }

     //收藏的文章
    public function article()
    {
        return $this->belongsToMany(Article::class,'lsl_collect','user_id','art_id');
    }









}