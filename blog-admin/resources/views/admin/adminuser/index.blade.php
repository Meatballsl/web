@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 管理员管理
    </div>
    <!--面包屑导航 结束-->


    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <!--结果集标题与导航组件 开始-->
        <div class="result_wrap">
            <div class="result_title">
                <h3>管理员列表</h3>
            </div>

            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/admin_user/create')}}"><i class="fa fa-plus"></i>新增管理员</a>
                </div>
            </div>

        </div>
        <!--结果集标题与导航组件 结束-->
        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">ID</th>
                        <th>账号</th>
                        <th>时间</th>
                        <th>属于角色</th>
                        <th>操作</th>
                    </tr>

                    @foreach($user as $value)
                        <tr>

                            <td class="tc">{{$value->id}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->created_at}}</td>
                            <td>
                               @foreach($value->roles as $v)
                                    <a onclick="deleteRole({{$v->id}},{{$value->id}})">{{$v->display_name}}</a>
                                   @endforeach
                            </td>
                            <td>
                                <a onclick="toRole({{$value->id}})">加入角色</a>
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

<input type="hidden" id="roleIds" >

    <script>

        function deleteHadle(id) {

            layer.confirm('确认删除？', {
                btn: ['确定', '取消'] //按钮
            }, function () {
                $.post("{{url('admin/admin_user/')}}/" + id, {
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

        function deleteRole(role_id,user_id) {

            layer.confirm('确认删除？', {
                btn: ['确定', '取消'] //按钮
            }, function () {
                $.post("{{url('admin/userRole/')}}/" , {
                    'user_id':user_id,
                    'role_id':role_id,
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



        function toRole(id) {
            layer.open({
                title:'加入角色',
                type: 2,
                area: ['700px', '530px'],
                fix: false, //不固定
                maxmin: true,
                content: '{{url("admin/list")}}',
                success:function(layero,index){
                },
                end:function(){
                    var roleIds = $("#roleIds").val();
                    if(roleIds){
                        $.post("{{url('admin/roleToUser/')}}/" , {
                            'user_id':id,
                            'role_id':roleIds,
                            '_token': "{{csrf_token()}}"
                        }, function (data) {
                            if (data.code == 0) {
                                layer.msg('成功', {icon: 6,time:3000});
                                location.href = location.href;


                            } else {
                                layer.msg('失败', {icon: 5});

                            }

                        });
                    }

                }
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


