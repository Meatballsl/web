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
                        <th>等级</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>

                    @foreach($user as $value)
                        <tr>

                            <td class="tc">{{$value->id}}</td>
                            <td><a target="_blank" href="{{url('home/person',$value->id)}}">{{$value->user_login}}</a></td>
                            <td>{{$value->user_email}}</td>

                            <td>{{$value->user_nicename}}</td>
                            <td><a onclick="update_status({{$value->id}})">{{$value->user_status}}</a></td>
                            <td>{{$value->create_time}}</td>
                            <td>
                                <a onclick="deleteHadle({{$value->id}})">删除</a>
                            </td>
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

        function deleteHadle(id) {

            layer.confirm('确认删除？', {
                btn: ['确定', '取消'] //按钮
            }, function () {
                $.post("{{url('admin/user/')}}/" + id, {
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

        function update_status(id) {
            layer.open({
                type: 1,
                skin: 'layui-layer-rim', //加上边框
                area: ['140px', '130px'], //宽高
                closeBtn: 1,
                btn: ['修改'], yes: function (index, layero) {

                    $.post(
                        "{{url('admin/updateStatus')}}",
                        {
                            'user_id': id,
                            'user_status': $("*[name='user_status']").val(),
                            '_token': "{{csrf_token()}}",

                        },
                        function (data) {
                            if (data) {
                                layer.close(index);
                                location.href = location.href;

                            }


                        }
                    );


                },
                title: "等级",
                content: ' <form><input type="text" name="user_status" ></form>',
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


