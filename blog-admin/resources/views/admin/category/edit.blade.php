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
                    <th>概述：</th>
                    <td>
                        <textarea name="summary">{{$field->summary}}</textarea>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>排序：</th>
                    <td>
                        <input type="text" class="sm" name="order" value="{{$field->order}}">
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>封面：</th>
                    <td>
                        <input type="text" name="thumb" class="lg" value="{{$field->thumb}}">
                        <form>
                            <div id="queue"></div>
                            <input id="file_upload" name="file_upload" type="file" multiple="true">
                            <script src="{{asset('resources/org/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
                        </form>
                    </td>
                </tr>

                <tr>
                    <th>缩略图</th>
                    <td>
                        <img src="/{{$field->thumb}}" id="small_thumb" style="max-width:100px" >
                    </td>
                </tr>

                <tr>
                    <th><i class="require">*</i>大图：</th>
                    <td>
                        <input type="text" name="show" class="lg" value="{{$field->show}}">
                        <form>
                            <div id="queue"></div>
                            <input id="file_upload_big" name="file_upload_big" type="file" multiple="true">
                            <script src="{{asset('resources/org/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
                        </form>
                    </td>
                </tr>

                <tr>
                    <th>缩略图</th>
                    <td>
                        <img src="/{{$field->show}}" id="small_thumb_big" style="max-width:100px" >
                    </td>
                </tr>
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
    <script>
        $(function () {
            $('#file_upload').uploadify({
                'formData': {
                    '_token': '{{csrf_token()}}'
                },
                'buttonText' : '上传图片',
                'swf': "{{asset('resources/org/uploadify/uploadify.swf')}}",
                'uploader': "{{url('admin/upload')}}",
                'onUploadSuccess' : function(file, data, response) {
                    $('input[name=thumb]').val(data);
                    $('#small_thumb').attr('src','/'+data);
                }
            });
        });

        $(function () {
            $('#file_upload_big').uploadify({
                'formData': {
                    '_token': '{{csrf_token()}}'
                },
                'buttonText' : '上传图片',
                'swf': "{{asset('resources/org/uploadify/uploadify.swf')}}",
                'uploader': "{{url('admin/upload')}}",
                'onUploadSuccess' : function(file, data, response) {
                    $('input[name=show]').val(data);
                    $('#small_thumb_big').attr('src','/'+data);
                }
            });
        });
    </script>
@endsection