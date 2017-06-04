@extends('layouts.home')
<link rel="stylesheet"
      href="{{asset('resources/views/home/person/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<link id="theme-style" rel="stylesheet" href="{{asset('resources/views/home/person/assets/css/styles.css')}}">
<link rel="stylesheet" href="{{asset('resources/org/ueditor/change.css')}}">

@section('body_name')
    <body id="body" class="portfolio">
    @endsection

    @section('body_part')

        <div id="page-header">
            <h3>{{$topic['name']}}</h3>

        </div>

        <article class="post format-standard hentry clearfix">

            <div class="entry-meta ">
                <div class="featured-image">
                <a class="post-format">
                    {{--<span class="icon"></span>--}}
                    <img src="/resources/views/home/style/images/comment.png">
                </a>
                <div class="ribbon">
                    <div class="text">楼主</div>
                </div>
                </div>
                <ul>
                    <li><span>On</span>
                        <time datetime="">{{$topic['created_at']}}</time>
                    </li>
                    <li><span>By</span><a href="{{url('home/person',[$topic['user_id']])}}"
                        title="Posts by Chris Mooney"
                                rel="author">{{$users[$topic['user_id']]['user_name']}}</a></li>
                    <il><h4>1楼</h4></il>
                </ul>
            </div>
            <div class="entry-wrap">

                <div class="entry-content">
                   {!! $topic['content'] !!}
                </div>

                <div>


                            <a href="#huifu" >回复</a>

                </div>

            </div>
        </article>

        @foreach($follower as $key=>$val)
        <article class="post format-standard hentry clearfix">

            <div class="entry-meta ">
                <div class="featured-image">
                    <a class="post-format">
                        {{--<span class="icon"></span>--}}
                        <img src="/resources/views/home/style/images/comment.png">
                    </a>
                    <div class="ribbon">
                        <div class="text"> @if($topic['user_id']===$val['user_id']) 楼主 @endif</div>
                    </div>
                </div>
                <ul>
                    <li><span>On</span>
                        <time datetime="">{{$val['created_at']}}</time>
                    </li>
                    <li><span>By</span><a href="{{url('home/person',[$topic['user_id']])}}"
                                title="Posts by Chris Mooney"
                                rel="author">{{$users[$val['user_id']]['user_name']}}</a></li>
                    <il><h4>{{$loop->index+2}}楼</h4></il>
                </ul>
            </div>
            <div class="entry-wrap">

                <div class="entry-content">
                    {!! $val['content'] !!}
                </div>

                {{--评论部分--}}
                <hr class="divider"/>
                <div>

                    @foreach($val->topicFollowerReply as $k=>$v)

                        <div>
                            <h4>{{$users[$v['user_id']]['user_name']}}评论：{{$v['content']}}</h4>

                        </div>
                    @endforeach

                            <a onclick="diag({{$val['id']}})">评论</a>

                </div>
                {{--评论部分--}}

            </div>
        </article>
     @endforeach
        <div class="page_list">
            {{$follower->links()}}
        </div>
        <section class="latest section">
            <div class="section-inner">

                <div class="content">

                    <div class="item featured text-center">
                        <h3 class="title"><a
                                    href="">发表回复</a>
                        </h3>


                    </div>
                    <div id="huifu">
                        <form action="{{url('home/topic/follower',$topic['id'])}}" method="post">
                            {{csrf_field()}}
                            <div>
                                <tr>

                                    <td><script name="content" id="editor" type="text/plain" style="width:884px;height:500px;"></script></td>
                                </tr>
                            </div>
                            <div>
                            <input type="submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>


                </div><!--//content-->
            </div><!--//section-inner-->
        </section><!--//section-->



        <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.config.js')}}"></script>
        <script type = "text/javascript" charset = "utf-8" src ="{{asset('resources/org/ueditor/ueditor.all.min.js')}}"></script>
        <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
        <script type="text/javascript">

            //实例化编辑器
            //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
            var ue = UE.getEditor('editor');
        </script>

        <script src="{{asset('resources/org/audiojs/audiojs/audio.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('resources/views/home/style/js/jquery-1.7.2.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>
        <script>
            audiojs.events.ready(function() {
                var as = audiojs.createAll();
            });

        </script>

        <script>
            function diag(id) {
                layer.open({
                    type: 1,
                    skin: 'layui-layer-rim', //加上边框
                    area: ['500px', '300px'], //宽高
                    closeBtn: 1,
                    btn: ['提交'], yes: function (index, layero) {

                        $.post(
                            "{{url('home/topic/reply')}}",
                            {

                                'content': $("*[name='reply_content']").val(),
                                '_token': "{{csrf_token()}}",
                                'follower_id':id,

                            },
                            function (data) {
                                if (data) {
                                    layer.close(index);
                                    location.href = location.href;

                                }


                            }
                        );


                    },
                    title: "评论",
                    content: ' <form> <label style="margin-left:20px">请输入评论的内容：</label> <textarea style="margin-left:20px;width: 400px;height: 200px" name="reply_content"></textarea></form>',
                });
            }

        </script>



@endsection