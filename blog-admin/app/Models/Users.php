<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model{
    protected $table = 'lsl_user';

    public $timestamps = false;

    public static function getUserName()
    {
        $users = self::all();

        foreach ($users as $key=>$val){

        }


    }
}