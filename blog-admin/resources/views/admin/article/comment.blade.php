@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 评论管理
    </div>
    <!--面包屑导航 结束-->


    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <!--结果集标题与导航组件 开始-->
        <div class="result_wrap">
            <div class="result_title">
                <h3>评论列表</h3>
            </div>



        </div>
        <!--结果集标题与导航组件 结束-->
        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">ID</th>
                        <th width="600px">评论</th>
                        <th>用户</th>
                        <th>文章</th>
                        <th>时间</th>
                        <th>操作</th>
                    </tr>

                    @foreach($comment as $key=>$value)
                        <tr>

                            <td class="tc">{{$value->id}}</td>
                            <td>{{$value->content}}</td>
                            <td>{{$users[$value->user_id]['user_name']}}</td>
                            <td> <a target="_blank" href="{{url('/article',$value->article_id)}}">{{$value->article->title}}</a></td>
                            <td>{{$value->created_at}}</td>
                            <td>
                                <a onclick="deleteHadle({{$value->id}})">删除</a>
                            </td>
                        </tr>
                    @endforeach

                </table>

                <div class="page_list">
                    {{$comment->links()}}
                </div>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->
    <script>

        function deleteHadle(id) {

            layer.confirm('确认删除？', {
                btn: ['确定', '取消'] //按钮
            }, function () {
                $.post("{{url('admin/comment')}}/" + id, {
                    '_method': 'delete',
                    '_token': "{{csrf_token()}}"
                }, function (data) {
                    if (data.code === 0) {
                        layer.msg('删除成功', {icon: 6});
                        location.href = location.href;

                    } else {
                        layer.msg('删除失败', {icon: 5});

                    }

                });
            }, function () {

            });
        }
    </script>
    <style>
        .result_content ul li span {
            font-size: 15px;
            padding: 6px 12px;
        }
    </style>
@endsection


