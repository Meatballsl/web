@extends('layouts.home')

@section('body_name')
    <body id="body" class="blog">
    @endsection

    @section('body_part')

        <!-- #page-header -->

        <div id="page-header">
            <h1>我的收藏</h1>
            <p></p>
        </div>
        <!-- /#page-header -->

        <!-- #primary -->
        <div id="primary" class="clearfix">
            <!-- #content -->


            <section id="content" role="main">
                @foreach($article as $key=>$val)
                    <article class="post format-standard hentry clearfix">

                        <div class="entry-meta ">
                            <div class="post-format"><span class="icon"></span></div>
                            <ul>
                                <li><span>On</span>
                                    <time datetime="{{$val['created_at']}}">{{$val['created_at']}}</time>
                                </li>
                                <li><span>By</span> <a href="{{url('home/person',$val['auther'])}}" title="Posts by Chris Mooney" rel="author">
                                        {{$user[$val['auther']]['user_name']}}
                                    </a></li>

                                <li><span>With</span> <a href="#"
                                                         title="Comment on The Martians had been repulsed">No
                                        Comments</a></li>
                            </ul>
                        </div>
                        <div class="entry-wrap">
                            <h2 class="entry-title"><a rel="bookmark" href="{{url('/article/')}}/{{$val['id']}}">
                                    {{$val['title']}}
                                </a></h2>
                            <div class="entry-content">
                                {{$val['summary']}}
                            </div>
                            <a href="{{url('/article/')}}/{{$val['id']}}" class="readmore" rel="nofollow">Read
                                More<span> &rarr;</span></a></div>
                    </article>
            @endforeach

                    <div class="page_list">
                        {{$article->links()}}
                    </div>
            <!-- .page-navigation -->
                <div class="page-navigation clearfix">
                    {{--<div class="nav-next"><span>&larr; </span> <a href="#">Older Entries</a></div>--}}
                    {{--<div class="nav-previous"></div>--}}
                    <!-- /.page-navigation -->

                </div>
            </section>

            <!-- /#content -->
            <!-- #sidebar -->
            <aside id="sidebar" role="complementary">
            @include('layouts.search')
               @include('layouts.right_cate')


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