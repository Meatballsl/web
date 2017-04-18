<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'lsl_user';

    public $timestamps = false;

    public static function getUserName()
    {
        $users = self::all();

        $id = [];
        $name = [];
        if ($users) {
            foreach ($users as $key => $val) {
                $id[$key] = $val['id'];
                $name[$key] = $val['user_login'];
            }

        }

        $userName = array_combine($id, $name);

        return $userName;

    }
}