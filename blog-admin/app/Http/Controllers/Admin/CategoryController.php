<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoryController extends CommonController
{
    /**GET
     * admin/cate
     * 查看列表
     */
    public function index()
    {
        $data = Category::getCategory();

        return view('admin.list')->with('data', $data);

    }


    /**
     * POST
     * admin/cate
     * 添加
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $rule = [
            'name' => 'required',
        ];

        $message = [
            'name.required' => 'name not allow null'
        ];


        $validate = Validator::make($input, $rule, $message);

        if (!$validate->passes()) {
            return back()->withErrors($validate);

        }
        return redirect('admin/cate');
    }

    /**GET
     *admin/cate/create
     * 创建
     */
    public function create()
    {
        $data = Category::where('pid', 0)->get();
        return view('admin.add')->with('data', $data);

    }

    /**
     * admin/cate/{cate}
     * GET
     * 展示
     */
    public function show()
    {

    }

    /**
     * PUT|PATCH
     * admin/cate/{cate}
     * 更新
     */
    public function update()
    {


    }

    /**
     * DELETE
     * admin/cate/{cate}
     * 删除
     */
    public function destroy()
    {

    }

    /**
     * admin/cate/{cate}/edit
     * GET|HEAD
     * 修改
     */
    public function edit()
    {

    }

    public function changeOrder(Request $request)
    {
        $input = $request->all();

        $orderNumber = $input['orderNumber'];

        $id = $input['id'];

        $oneRecord = Category::where('id', $id)->first();

        $oneRecord->order = $orderNumber;

        $result = $oneRecord->save();

        if ($result) {
            return [
                'status' => 0,
                'msg' => "排序修改成功",
            ];
        }
        return [
            'status' => 0,
            'msg' => "排序修改失败",
        ];


    }

    public function test()
    {
//        $all = Category::all();
//        foreach ($all as $value){
//            var_dump($value->name);
//        }
//        echo $all[5]['name'];

        $get = Category::where('name', '时尚达人')->where('name', '心情随笔')->get();

        var_dump($get[1]['name']);


    }
}
