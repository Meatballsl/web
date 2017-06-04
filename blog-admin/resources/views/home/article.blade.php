@extends('layouts.home')

@section('body_name')
    <body id="body" class="blog-single">
    @endsection

    @section('body_part')
        <!-- #site-container -->

        <!-- /#header -->


        <!-- #page-header -->
        <div id="page-header">
            <h1>{{$article['title']}}</h1>
            <p>{{$article['summary']}}
        </div>
        <!-- /#page-header -->

        <!-- #primary -->
        <div id="primary" class="clearfix">
            <!-- #content -->
            <section id="content" role="main">
                <article class="post format-standard hentry clearfix">
                    <div class="entry-meta ">

                        <div class="post-format">
                            <span class="icon"></span>
                        </div>


                        <ul>
                            <li><span>On</span>
                                <time datetime="{{$article['created_at']}}">{{$article['created_at']}}</time>
                            </li>
                            <li><span>By</span> <a href="{{url('home/person',$article['auther'])}}" title="Posts by Chris Mooney"
                                                   rel="author">{{$user[$article['auther']]['user_name']}}</a></li>

                            <li><span>With</span> @if($article['is_comment']===1)<a>Can Comment</a>@else<a >No Comments</a>@endif</li>
                            <li></li>
                        </ul>


                    </div>
                    <div class="entry-wrap">
                        <header class="entry-header">

                            <div class="entry-thumb">
                                <img src="/{{$article['thumb']}}" alt=""/>
                            </div>

                        </header>

                        {!! $article['content'] !!}
                    </div>


                    <div style="margin-left: 600px">


                            <div id="collect" @if($collect===0) style="display: block" @else style="display: none" @endif>
                             <a onclick="collect({{$article['id']}})" >
                                 <img  src="{{asset('/resources/views/home/style/images/favorite.png')}}">
                                 <h3>收藏</h3>
                             </a>
                            </div>

                            <div id="de_collect" @if($collect===1) style="display: block" @else style="display: none" @endif>
                            <a onclick="del_collect({{$article['id']}})" >
                                <img  src="{{asset('/resources/views/home/style/images/favorites-filling.png')}}">
                                <h3>取消收藏</h3>
                            </a>
                            </div>



                    </div>

                </article>

                @if($article['is_comment']===1)
                    <section id="respond" class="clearfix">


                        <h3 id="respond-title" class="deco"><span class="outer"><span class="inner">评论区</span></span>
                        </h3>

                        @foreach($comment as $key=>$value)
                            <article class="post format-standard hentry clearfix">

                                <div class="entry-meta ">
                                    <div class="post-format">
                                        {{--<span class="icon"></span>--}}
                                        <img src="/resources/views/home/style/images/comment.png">
                                    </div>
                                    <ul>
                                        <li><span>On</span>
                                            <time datetime="">{{$value->created_at}}</time>
                                        </li>
                                        <li><span>By</span> @if($value->user_id===20) <a  @else <a
                                                    href="{{url('home/person',$value->user_id)}}" @endif
                                            title="Posts by Chris Mooney"
                                                    rel="author">{{$user[$value->user_id]['user_name']}}</a></li>

                                    </ul>
                                </div>
                                <div class="entry-wrap">

                                    <div class="entry-content">
                                        {{$value->content}}
                                    </div>

                                    <div>

                                        @foreach($value->reply as $k=>$v)
                                            <hr>
                                            <div>
                                                <label>作者回复：</label>
                                                {{$v['content']}}
                                            </div>
                                        @endforeach
                                        <div>

                                        </div>
                                            @if(session('user'))
                                        @if($article['auther']==session('user')->id)
                                            <a onclick="diag({{$value['id']}})">回复</a>
                                        @endif
                                                @endif
                                    </div>

                                </div>
                            </article>
                        @endforeach


                        <form action="{{url('home/comment')}}" method="post">


                            <div>
                                {{csrf_field()}}
                                <textarea name="content" id="comment" rows="6" tabindex="4"></textarea>
                                @if(session('user'))
                                    <input type="hidden" name="user_id" value="{{session('user')->id}}">
                                @else
                                    <input type="hidden" name="user_id" value="20">
                                @endif
                                <input type="hidden" name="article_id" value="{{$article['id']}}">
                            </div>
                            <div style="margin-top: 30px">
                                <input style="background-color: #3294a6" type="submit">
                            </div>
                        </form>

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
                    </section>
                @endif
            </section>
            <!-- #content -->
            <!-- #sidebar -->
            <aside id="sidebar" role="complementary">
                @include('layouts.search')
                @include('layouts.right_cate')
            </aside>
        </div>
        <!-- /#primary -->

        <!-- #footer -->

        <!-- /#footer-bottom -->

        <!-- /#container -->

        <style>
            .result_content ul li span {
                font-size: 15px;
                padding: 6px 12px;
            }
        </style>

        <script>
            function diag(id) {
                layer.open({
                    type: 1,
                    skin: 'layui-layer-rim', //加上边框
                    area: ['500px', '300px'], //宽高
                    closeBtn: 1,
                    btn: ['提交'], yes: function (index, layero) {

                        $.post(
                            "{{url('home/comment/reply')}}",
                            {
                                'user_id': "{{$article['auther']}}",
                                'content': $("*[name='reply_content']").val(),
                                '_token': "{{csrf_token()}}",
                                'comment_id': id
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


            function collect(id) {



               @if(!session('user'))
                layer.msg("请先登录");
                @else
                 $.post(
                    "{{url('home/collect')}}",
                    {

                        '_token': "{{csrf_token()}}",
                        'art_id': id
                    },
                    function (data) {
                        if (data.code == 0) {
                            layer.msg('收藏成功', {icon: 6});
                            //setTimeout(function(){ location.href = location.href;  },2000);
                            $("#collect").css('display','none');
                            $("#de_collect").css('display','block');
                        } else {
                            layer.msg('收藏失败', {icon: 5});

                        }


                    }
                );

               @endif


            }

            function del_collect(id) {
                $.post(
                    "{{url('home/collect')}}",
                    {
                        '_method':"delete",
                        '_token': "{{csrf_token()}}",
                        'art_id': id
                    },
                    function (data) {
                        if (data.code == 0) {
                            layer.msg('取消收藏成功', {icon: 6});
                            //setTimeout(function(){ location.href = location.href;  },2000);
                            $("#collect").css('display','block');
                            $("#de_collect").css('display','none');

                        } else {
                            layer.msg('取消收藏失败', {icon: 5});

                        }


                    }
                );

            }
        </script>

@endsection



