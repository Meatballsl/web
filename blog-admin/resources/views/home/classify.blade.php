@extends('layouts.home')

@section('body_name')
    <body id="body" class="blog">
    @endsection

    @section('body_part')

        <!-- #page-header -->

        <div id="page-header">
            <h1>{{$cateDetail['name']}}</h1>
            <p>{{$cateDetail['summary']}}</p>
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
        <script>
            var getElementsByClassName = function (a, b, c) {
                        if (document.getElementsByClassName) {
                            getElementsByClassName = function (a, b, c) {
                                c = c || document;
                                var d = c.getElementsByClassName(a), e = b ? new RegExp("\\b" + b + "\\b", "i") : null, f = [], g;
                                for (var h = 0, i = d.length; h < i; h += 1) {
                                    g = d[h];
                                    if (!e || e.test(g.nodeName)) {
                                        f.push(g)
                                    }
                                }
                                return f
                            }
                        } else if (document.evaluate) {
                            getElementsByClassName = function (a, b, c) {
                                b = b || "*";
                                c = c || document;
                                var d = a.split(" "), e = "", f = "http://www.w3.org/1999/xhtml", g = document.documentElement.namespaceURI === f ? f : null, h = [], i, j;
                                for (var k = 0, l = d.length; k < l; k += 1) {
                                    e += "[contains(concat(' ', @class, ' '), ' " + d[k] + " ')]"
                                }
                                try {
                                    i = document.evaluate(".//" + b + e, c, g, 0, null)
                                } catch (m) {
                                    i = document.evaluate(".//" + b + e, c, null, 0, null)
                                }
                                while (j = i.iterateNext()) {
                                    h.push(j)
                                }
                                return h
                            }
                        } else {
                            getElementsByClassName = function (a, b, c) {
                                b = b || "*";
                                c = c || document;
                                var d = a.split(" "), e = [], f = b === "*" && c.all ? c.all : c.getElementsByTagName(b), g, h = [], i;
                                for (var j = 0, k = d.length; j < k; j += 1) {
                                    e.push(new RegExp("(^|\\s)" + d[j] + "(\\s|$)"))
                                }
                                for (var l = 0, m = f.length; l < m; l += 1) {
                                    g = f[l];
                                    i = false;
                                    for (var n = 0, o = e.length; n < o; n += 1) {
                                        i = e[n].test(g.className);
                                        if (!i) {
                                            break
                                        }
                                    }
                                    if (i) {
                                        h.push(g)
                                    }
                                }
                                return h
                            }
                        }
                        return getElementsByClassName(a, b, c)
                    },
                    dropdowns = getElementsByClassName('dropdown-menu');
            for (i = 0; i < dropdowns.length; i++)
                dropdowns[i].onchange = function () {
                    if (this.value != '') window.location.href = this.value;
                }
        </script>
        <style>
            .page_list ul li span {
                font-size: 15px;
                padding: 6px 12px;
            }
        </style>
@endsection