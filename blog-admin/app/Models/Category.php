<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'lsl_category';

    public $timestamps = false;

    public static function getCategory()
    {
        $category = self::orderBy('order')->get();

        $data = self::getTree($category,'id','pid','name','├─',0);

        return $data;
    }

    /**
     * @param $data 数据库的一整张表的数据
     * @param $id   数据库的字段 主键
     * @param $pid  数据库的父主键
     * @param $param 要格式化的参数
     * @param $sign 什么格式
     * @return array
     */
    public static function getTree($data,$id='id',$pid='pid',$param,$sign,$pidValue)
    {
        foreach ($data as $keyParent => $vaParent){

            if($vaParent[$pid] == $pidValue){

                $arr[] = $vaParent;

                foreach($data as $keySon => $vaSon){

                    if($vaSon[$pid] == $vaParent[$id]){
                        $vaSon[$param] = $sign.$vaSon[$param];
                        $arr[] = $vaSon;
                    }
                }
            }
        }

        return $arr;
    }

}
