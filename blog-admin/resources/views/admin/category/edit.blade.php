@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i><a href="{{url('admin/info')}}">首页</a> &raquo;<a href="{{url('admin/cate')}}">分类管理</a>  &raquo;编辑分类
    </div>
    <!--面包屑导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>编辑分类</h3>

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
        <div class="result_content">
            <div class="short_wrap">
                <a href="javascript:;"><i class="fa fa-plus"></i>编辑分类</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form method="post" action="{{url('admin/cate/'.$field->id.'')}}">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>

                <tr>
                    <th width="120"><i class="require">*</i>分类：</th>
                    <td>
                        <select name="pid">
                            <option value="0">==无父类==</option>
                            @foreach($data as  $value){

                            <option value="{{$value->id}}" @if($value->id==$field->pid) selected="selected" @endif>{{$value->name}}</option>
                            }
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>分类名称：</th>
                    <td>
                        <input type="text" name="name" value="{{$field->name}}">
                    </td>
                </tr>
                <tr>
                    <th>描述：</th>
                    <td>
                        <input type="text" class="lg" name="title" value="{{$field->title}}">
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>排序：</th>
                    <td>
                        <input type="text" class="sm" name="order" value="{{$field->order}}">
                    </td>
                </tr>
                {{--<tr>--}}
                {{--<th><i class="require">*</i>封面：</th>--}}
                {{--<td><input type="file" name="thumb" value="{{$field->thumb}}"></td>--}}
                {{--</tr>--}}

                <tr>
                    <th></th>
                    <td>
                        <input type="submit" value="提交">
                        <input type="button" class="back" onclick="history.go(-1)" value="返回">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
@endsection