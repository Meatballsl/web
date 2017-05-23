@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 会员管理
    </div>
    <!--面包屑导航 结束-->


    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <!--结果集标题与导航组件 开始-->
        <div class="result_wrap">
            <div class="result_title">
                <h3>会员列表</h3>
            </div>



        </div>
        <!--结果集标题与导航组件 结束-->
        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">ID</th>
                        <th>账号</th>
                        <th>邮箱</th>
                        <th>昵称</th>
                        <th>专栏状态</th>
                        <th>操作</th>
                    </tr>

                    @foreach($user as $value)
                        <tr>

                            <td class="tc">{{$value->id}}</td>
                            <td><a target="_blank" href="{{url('home/person',$value->id)}}">{{$value->user_login}}</a></td>
                            <td>{{$value->user_email}}</td>

                            <td>{{$value->user_nicename}}</td>

                            @if($value->is_column===2)
                            <td style="color: #d62728">
                                {{$column[$value->is_column]}}
                            </td>
                                <td>
                                    <a onclick="column_pass({{$value->id}})">通过审核</a>
                                    <a onclick="column_del({{$value->id}})">取消资格</a>
                                </td>
                            @elseif($value->is_column===1)
                                <td >
                                    {{$column[$value->is_column]}}
                                </td>
                                <td><a onclick="column_del({{$value->id}})">取消资格</a></td>
                                @else
                                <td >
                                    {{$column[$value->is_column]}}
                                </td>
                                <td><a onclick="column_del({{$value->id}})">-</a></td>
                            @endif


                        </tr>
                    @endforeach

                </table>

                <div class="page_list">
                    {{$user->links()}}
                </div>
            </div>
        </div>
    </form>

    <!--搜索结果页面 列表 结束-->
    <script>
        function column_pass(id) {
            layer.confirm('确认通过审核？', {
                btn: ['确定', '取消'] //按钮
            }, function () {
                $.post("{{url('admin/column_pass')}}" , {
                    'user_id': id,
                    '_token': "{{csrf_token()}}"
                }, function (data) {
                    if (data.code == 0) {
                        layer.msg('审核成功', {icon: 6});
                         setTimeout(function () {
                             location.href = location.href;
                         },3000)

                    } else {
                        layer.msg('审核失败', {icon: 5});

                    }

                });
            }, function () {
            });
        }

        function  column_del(id) {
            layer.confirm('确认取消资格？', {
                btn: ['确定', '取消'] //按钮
            }, function () {
                $.post("{{url('admin/column_delete')}}" , {
                    'user_id': id,
                    '_token': "{{csrf_token()}}"
                }, function (data) {
                    if (data.code == 0) {
                        layer.msg('取消成功', {icon: 6});
                        setTimeout(function () {
                            location.href = location.href;
                        },3000)

                    } else {
                        layer.msg('取消失败', {icon: 5});

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


