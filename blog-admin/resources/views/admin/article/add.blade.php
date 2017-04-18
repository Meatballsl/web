@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo;<a
                href="{{url('admin/article')}}">文章管理</a> &raquo;添加文章
    </div>
    <!--面包屑导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>添加文章</h3>

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
                <a href="javascript:;"><i class="fa fa-plus"></i>新增文章</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form method="post" action="{{url('admin/article')}}">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>

                <tr>
                    <th width="120"><i class="require">*</i>分类：</th>
                    <td>
                        <select name="cid">
                            @foreach($data as  $value){
                            <option value="{{$value->id}}">{{$value->name}}</option>
                            }
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>文章标题：</th>
                    <td>
                        <input type="text" name="title" class="lg">
                    </td>
                </tr>
                <tr>
                    <th>简介</th>
                    <td>
                        <textarea name="summary"></textarea>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>封面：</th>
                    <td>
                        <input type="text" name="thumb" class="lg">
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
                        <img src="" id="small_thumb" style="max-width:100px" >
                    </td>
                </tr>

                <tr>
                    <th><i class="require">*</i>内容：</th>
                    <td>
                        <script name="content" id="editor" type="text/plain" style="width:884px;height:500px;"></script>
                    </td>
                </tr>

                <tr>
                    <th>是否公开：</th>
                    <td>
                        <label><input type="radio" name="is_public" value="1">公开</label>
                        <label><input type="radio" name="is_public" value="0">私密</label>
                    </td>
                </tr>

                <tr>
                    <th>评论：</th>
                    <td>
                        <label><input type="radio" name="is_comment" value="1">允许</label>
                        <label><input type="radio" name="is_comment" value="0">不允许</label>
                    </td>
                </tr>
                <tr>
                    <th>是否置顶：</th>
                    <td>
                        <label><input type="radio" name="is_top" value="1">是</label>
                        <label><input type="radio" name="is_top" value="0">否</label>
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
    <script type="text/javascript">

        //实例化编辑器
        //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
        var ue = UE.getEditor('editor');
    </script>

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
</script>
@endsection