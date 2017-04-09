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

        return view('admin.category.list')->with('data', $data);

    }

    /**GET
     *admin/cate/create
     * 创建
     */
    public function create()
    {
        $data = Category::where('pid', 0)->get();
        return view('admin.category.add')->with('data', $data);

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
        $add = Category::create($input);

        if (!$add) {
            return back()->with("msg", "add error");
        }
        return redirect('admin/cate');
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
     * admin/cate/{cate}/edit
     * GET|HEAD
     * 修改
     */
    public function edit(Request $request, $id)
    {
        $field = Category::find($id);//前端无需遍历

        $data = Category::where('pid', 0)->get();//前端通过遍历
        return view('admin.category.edit', compact('field', 'data'));
    }

    /**
     * PUT|PATCH
     * admin/cate/{cate}
     * 更新
     * 前端： <input type="hidden" name="_method" value="put">
     */
    public function update(Request $request, $id)
    {
        $input = $request->except(['_method', '_token']);

        $result = Category::where('id', $id)->update($input);

        if ($result===false) {
            return back()->with('msg', 'update error');
        }

        return redirect('admin/cate');


    }

    /**
     * DELETE
     * admin/cate/{cate}
     * 删除
     */
    public function destroy(Request $request, $id)
    {
        //父级删掉，儿子变父亲
        $result = Category::where('id',$id)->delete();
        Category::where('pid',$id)->update(['pid'=>0]);
        if(!$result){
            return [
                'code'=>1,
                'msg'=>'delete error'
            ];
        }
        return [
            'code'=>0,
            'msg'=>'delete success'
        ];
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
