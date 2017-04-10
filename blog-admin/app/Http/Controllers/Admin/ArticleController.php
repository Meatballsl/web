<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class ArticleController extends CommonController
{
    /**GET
     * admin/cate
     * 查看列表
     */
    public function index()
    {
        $data = [];

        return view('admin.category.list')->with('data', $data);

    }

    /**GET
     *admin/article/create
     * 创建
     */
    public function create()
    {
        $data =[];
        return view('admin.article.add')->with('data', $data);

    }
}
