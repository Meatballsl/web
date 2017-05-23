@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 话题管理
    </div>
    <!--面包屑导航 结束-->


    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <!--结果集标题与导航组件 开始-->
        <div class="result_wrap">
            <div class="result_title">
                <h3>话题列表</h3>
            </div>



        </div>
        <!--结果集标题与导航组件 结束-->
        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">ID</th>
                        <th>回复</th>
                        <th>发表人</th>
                        <th>跟帖</th>
                        <th>时间</th>
                        <th>操作</th>
                    </tr>

                    @foreach($followerComment as $value)
                        <tr>

                            <td class="tc">{{$value->id}}</td>
                            <td>{{$value->content}}</td>
                            <td>{{$users[$value->user_id]['user_name']}}</td>
                            <td>{!!$value->topicFollower->content!!}</td>
                            <td>{{$value->created_at}}</td>

                            <td>
                                <a onclick="deleteHadle({{$value->id}})">删除</a>
                            </td>
                        </tr>
                    @endforeach

                </table>

                <div class="page_list">
                    {{$followerComment->links()}}
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
                $.post("{{url('admin/followerComment/')}}/" + id, {
                    '_method': 'delete',
                    '_token': "{{csrf_token()}}"
                }, function (data) {
                    if (data.code == 0) {
                        layer.msg('删除成功', {icon: 6});

                    } else {
                        layer.msg('删除失败', {icon: 5});

                    }
                    location.href = location.href;
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


