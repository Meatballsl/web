@extends('layouts.home')

@section('body_name')
    <body id="body" class="portfolio-single">
    @endsection


    @section('body_part')
        <!-- /#header -->
        <!-- #primary -->
        <!--搜索结果页面 列表 开始-->
        <form action="#" method="post">
            <!--结果集标题与导航组件 开始-->
            <div class="result_wrap">
                <div class="result_title">
                    <h3>文章列表</h3>
                </div>
                <div class="result_content">
                    <div class="short_wrap">
                        <a href="{{url('home/article/create')}}"><i class="fa fa-plus"></i>新增文章</a>
                    </div>
                </div>
            </div>
            <!--结果集标题与导航组件 结束-->
            <div class="result_wrap">
                <div class="result_content">
                    <table class="list_tab">
                        <tr>
                            <th class="tc">ID</th>
                            <th>标题</th>
                            <th>作者</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>

                        @foreach($data as $value)
                            <tr>

                                <td class="tc">{{$value->id}}</td>
                                <td>
                                    <a href="{{url('/article/'.$value->id)}}">{{$value->title}}</a>
                                </td>
                                <td>{{$users[$value->auther]}}</td>
                                <td>{{$status[$value->status]}}</td>

                                <td>
                                    <a href="{{url('home/article/'.$value->id.'/edit')}}">修改</a>
                                    <a onclick="deleteHadle({{$value->id}})">删除</a>
                                </td>
                            </tr>
                        @endforeach

                    </table>

                    <div class="page_list">
                        {{$data->links()}}
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
                    $.post("{{url('home/article/')}}/" + id, {
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