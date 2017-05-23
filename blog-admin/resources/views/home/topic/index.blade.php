@extends('layouts.home')
<link rel="stylesheet"
      href="{{asset('resources/views/home/person/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<link id="theme-style" rel="stylesheet" href="{{asset('resources/views/home/person/assets/css/styles.css')}}">
<link rel="stylesheet" href="{{asset('resources/org/ueditor/change.css')}}">
<style>
    .hang{
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }


</style>
@section('body_name')
    <body id="body" class="portfolio">
    @endsection

    @section('body_part')

        <div id="page-header">
            <h1>话题讨论</h1>
            <p>开启话题讨论之旅</p>
        </div>

        @foreach($topic as $key=>$val)
        <aside class="testimonials aside section">
            <div class="section-inner">
                <!--topic 1-->
                <h2 class="heading"><a href="{{url('home/topic' ,$val['id'])}}">{{$val['name']}}</a></h2>
                <div class="content">
                    <div class="item">
                        <blockquote class="quote ">
                            <p><i class="fa fa-quote-left" ></i> @if(mb_strlen($val['content'])>=143) {!! mb_substr($val['content'],0,142) !!}... @else {!! $val['content'] !!} @endif</p>
                        </blockquote>

                        <p class="source"><span class="name">{{$users[$val['user_id']]['user_name']}}</span><br /><span class="title">{{$val['created_at']}}</span></p>
                    </div><!--//item-->

                    <p><a class="more-link" href="{{url('home/topic' ,$val['id'])}}"><i class="fa fa-external-link"></i> More on Linkedin</a></p>

                </div><!--//content-->
                <hr class="divider" />
                <!--topic 1-->

            </div><!--//section-inner-->
        </aside>
        @endforeach
        <div class="page_list">
            {{$topic->links()}}
        </div>

        <section class="latest section">
            <div class="section-inner">

                <div class="content">

                    <div class="item featured text-center">
                        <h3 class="title"><a
                                    href="">发布话题</a>
                        </h3>


                    </div>
                    <div>
                        <form action="{{url('home/topic/')}}" method="post">
                            {{csrf_field()}}
                            <div>
                                <tr>
                                <label>标题：</label>
                            <input type="text" name="name"  >
                                </tr>
                            </div>
                            <div>
                                <tr>
                                    <label>内容：</label>
                                    <td><script name="content" id="editor" type="text/plain" style="width:884px;height:500px;"></script></td>
                                </tr>
                            </div>
                            <div>
                                <tr>
                            <input type="submit" class="btn btn-primary">
                                </tr>
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


@endsection