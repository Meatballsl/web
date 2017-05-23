@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo;<a
                href="{{url('admin/role')}}">角色管理</a> &raquo;添加角色
    </div>
    <!--面包屑导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>添加角色</h3>

            @if(session('msg'))
                {{session('msg')}}
            @endif
            @if(count($errors)>0)
                @foreach($errors->all() as $value)
                    <div class="mark">
                        {{$value}}
                    </div>
                @endforeach
            @endif

        </div>

    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form method="post" action="{{url('admin/role')}}">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>


                <tr>
                    <th><i class="require">*</i>名称：</th>
                    <td>
                        <input type="text" name="name" class="lg">
                    </td>
                </tr>

                <tr>
                    <th><i class="require">*</i>别称：</th>
                    <td>
                        <input type="text" name="display_name" class="lg">
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>描述：</th>
                    <td>
                        <input type="text" name="description" class="lg">
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input type="submit" value="提交">

                    </td>
                </tr>
                </tbody>

            </table>
        </form>
    </div>



@endsection