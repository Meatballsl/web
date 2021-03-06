@extends('layouts.home')

@section('body_name')
    <body id="body" class="blog">
    @endsection
    @section('body_part')
        <!-- /#header -->

        <!-- #page-header -->

        <div id="page-header">
            <h1>{{$user['user_nicename']}}的博客</h1>
            <p>{{$user['signature']}}</p>
        </div>
        <!-- /#page-header -->

        <!-- #primary -->
        <div id="primary" class="clearfix">
            <!-- #content -->
            <section id="content" role="main">
                @foreach($article as $key=>$val)
                    <article class="post format-standard hentry clearfix">
                        <div class="entry-thumb">

                            <img src="/{{$val['thumb']}}" alt=""/>

                        </div>
                        <div class="entry-meta ">
                            <div class="post-format"><span class="icon"></span></div>
                            <ul>
                                <li><span>On</span>
                                    <time datetime="2012-04-18">{{$val['created_at']}}</time>
                                </li>
                                <li><span>By</span> <a href="{{url('home/person',$val['auther'])}}" title="Posts by Chris Mooney" rel="author">{{$users[$val['auther']]['user_name']}}</a>
                                </li>

                                <li><span>With</span> @if($val['is_comment']===1)<a>Can Comment</a>@else<a >No Comments</a>@endif</li>

                                </li>
                            </ul>
                        </div>
                        <div class="entry-wrap">
                            <h2 class="entry-title"><a rel="bookmark" href="{{url('/article/'.$val['id'])}}">{{$val['title']}}

                                </a></h2>
                            <div class="entry-content">
                                {{$val['summary']}}
                            </div>
                            <a href="{{url('/article/'.$val['id'])}}" class="readmore" rel="nofollow">Read
                                More<span> &rarr;</span></a></div>
                    </article>
            @endforeach

            <!-- .page-navigation -->
                <div class="page-navigation clearfix">
                    <div class="nav-next"><span>&larr; </span> <a href="#">Older Entries</a></div>
                    <div class="nav-previous"></div>
                    <!-- /.page-navigation -->

                </div>

                <div class="page_list">
                    {{$article->links()}}
                </div>
            </section>
            <!-- /#content -->
            <!-- #sidebar -->
            <aside id="sidebar" role="complementary">
                @include('layouts.search')
                @include('layouts.right_cate')

                <div class="widget-last widget widget_categories clearfix">
                    <h4>类型分类</h4>
                    <ul>
                        <li><a href="#" title="View all posts filed under Audio">视频</a></li>
                        <li><a href="#" title="View all posts filed under Link">音频</a></li>
                        <li><a href="#" title="View all posts filed under Quick Thoughts">二手交易</a></li>
                        <li><a href="#" title="View all posts filed under Quotes">问答</a></li>
                        <li><a href="#" title="View all posts filed under Uncategorized">约约</a></li>
                    </ul>
                </div>


                <!-- #sidebar -->
            </aside>
        </div>
        <!-- /#primary -->

        <!-- #footer -->

        <!-- /#footer-bottom -->


        <!-- /#container -->

        <style>
            .page_list ul li span {
                font-size: 15px;
                padding: 6px 12px;
            }
        </style>

@endsection