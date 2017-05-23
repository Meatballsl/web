@include('home.person.common')
<link rel="stylesheet" href="{{asset('resources/org/ueditor/change.css')}}">

<body>
<div class="kk">
    <!-- ******HEADER****** -->
    <style>
        .sections-wrapper2 {
            padding-top: 30px;
            padding-bottom: 60px;
            margin-left: -30px;
        }
    </style>
    <div class="header">
        <div class="container">
            <div class="col-lg-offset-7">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span> <a href="{{url('index')}}">首页</a>
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span> <a href="{{url('home/person',$user->id)}}">主页</a>
            </div>
            {{--封面--}}
            <div class="container sections-wrapper2  ">

                <div class="primary col-md-9 col-md-offset-0  ">


                    <section class="latest section">
                        <div class="section-inner">

                            <div class="content">

                                <div class="item featured text-center">
                                    <h3 class="title"><a
                                                href="">{{$user['user_nicename']}}的留言板</a></h3>
                                    <p class="summary"></p>
                                    <div class="featured-image">
                                        <a>
                                            <img class="img-responsive project-image"
                                                 src="{{asset('resources/views/home/person/assets/images/projects/project-featured.png')}}"
                                                 alt="project name"/>
                                        </a>

                                    </div>

                                    <div class="desc text-left">
                                        <p>请在我的留言板畅所欲养，有什么想对我说的都抛来吧来吧。</p>

                                    </div><!--//desc-->


                                </div><!--//item-->
                                <hr class="divider"/>
                                {{--列表--}}

                                @foreach($message as $key=>$val)
                                    <div class="item row">
                                        <div class="col-md-3 ">

                                            <div class="item">
                                                <a> <img class="img-responsive img-circle "
                                                         src="/{{$users[$val['follower_id']]['avatar']}}"
                                                         width="100px" alt="James Lee"/>
                                                </a>
                                            </div>


                                            <div class="item">
                                                <h4 class="col-md-offset-1 title">{{$users[$val['follower_id']]['user_name']}}</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="item">{{$val['created_at']}}</div>
                                            <div class="item">
                                                <p>{!!$val['content']!!}
                                                </p>
                                            </div>
                                        </div>
                                        <hr class="divider"/>
                                        <div>
                                        @foreach($val->messageReply as $k=>$v)
                                            <div style="color: #99cb84">
                                                作者回复：
                                            {{$v['content']}}
                                        </div>
                                        @endforeach


                                        </div>

<div>
                                        @if(session('user'))
                                            @if(session('user')->id === $user['id'])
                                                <a onclick="diag({{$val['id']}},{{session('user')->id}})">回复</a>
                                                <a onclick="delete_message({{$val['id']}})">删除</a>
                                            @endif
                                        @endif
</div>
                                    </div>

                                    <hr class="divider"/>
                                @endforeach
                                {{--列表完--}}
                                <div class="page_list">
                                    {{$message->links()}}
                                </div>

                            </div><!--//content-->
                        </div><!--//section-inner-->
                    </section><!--//section-->

                    <section class="latest section">
                        <div class="section-inner">

                            <div class="content">

                                <div class="item featured text-center">
                                    <h3 class="title"><a
                                                href="">请写下你的留言</a>
                                    </h3>


                                </div>
                                <div>
                                    <form action="{{url('home/message')}}" method="post">
                                        <div>
                                            <tr>
                                                <td> <input type="hidden" name="user_id" value="{{$user['id']}}"></td>
                                               {{csrf_field()}}
                                                <td><script name="content" id="editor" type="text/plain"
                                                            style="width:884px;height:500px;"></script></td>
                                            </tr>
                                        </div>
                                        <input type="submit" class="btn btn-primary"></form>
                                </div>


                            </div>
                        </div>
                    </section>


                </div>

            </div>
        {{--封面完--}}

        {{--评论表单--}}





        {{--评论表单完--}}

        <!-- Javascript -->
        </div>


    </div>
</div>
<script type="text/javascript" src="{{asset('resources/views/home/style/js/jquery-1.7.2.min.js')}}"></script>
<script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.config.js')}}"></script>
<script type = "text/javascript" charset = "utf-8" src = "{{asset('resources/org/ueditor/ueditor.all.min.js')}}" ></script>
<script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>
<script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
</script>
<script>
    function diag(message_id,user_id) {
        layer.open({
            type: 1,
            skin: 'layui-layer-rim', //加上边框
            area: ['500px', '300px'], //宽高
            closeBtn: 1,
            btn: ['提交'], yes: function (index, layero) {

                $.post(
                    "{{url('home/message/reply')}}",
                    {
                        'user_id': user_id,
                        'content': $("*[name='reply_content']").val(),
                        '_token': "{{csrf_token()}}",
                        'message_id': message_id
                    },
                    function (data) {
                        if (data) {
                            layer.close(index);
                            location.href = location.href;

                        }


                    }
                );


            },
            title: "回复",
            content: ' <form> <label style="margin-left:20px">请输入回复的内容：</label> <textarea style="margin-left:20px;width: 400px;height: 200px" name="reply_content"></textarea></form>',
        });
    }

    function  delete_message(message_id) {
        layer.confirm('确认删除？', {
            btn: ['确定', '取消'] //按钮
        }, function () {
            $.post("{{url('home/message/delete')}}" , {
                'id':message_id,

                '_token': "{{csrf_token()}}"
            }, function (data) {
                if (data.code == 0) {
                    layer.msg('删除成功', {icon: 6});
                    setTimeout(function () {
                        location.href = location.href;
                    },3000)

                } else {
                    layer.msg('删除失败', {icon: 5});

                }

            });
        }, function () {
        });
    }

</script>
</body>
</html> 

