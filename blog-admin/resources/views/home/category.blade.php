@extends('layouts.home')

@section('body_name')
<body id="body" class="portfolio-single">
@endsection

@section('body_part')

<!-- /#header -->


<!-- #page-header -->
<div id="page-header">
    <h1>分类专栏</h1>
    <p>选择你喜欢的分类，进去遛一遛</p>
</div>
<!-- /#page-header -->

<!-- #primary -->
<div id="primary" class="clearfix">
    <!-- #content-->
    <section id="content" role="main" class="fullwidth">
        <article class="st_portfolio hentry clearfix">

            <div class="entry-thumb">

                <img height="365" width="580" alt=""
                     src="{{asset('resources/views/home/style/2012/04/520385224_9a679aa1fb_b-580x365.jpg')}}"/>

            </div>

            <div class="entry-wrap">

                <h1 class="entry-title"><a href="{:U('home/Index/classify_detail')}">心情随笔</a></h1>
                <span class="div"></span>
                <div class="entry-content">
                    <p>心情日志随笔,抒写心情故事,记录定格心情!</p>
                    <p>随笔写下你的心情,让别人也懂你的世界!</p>
                    <p>心情随笔栏目收集了心情随笔日志;心情有时好,有事坏,记录下来与别人分享,与以后的自己分享。</p>
                </div>

            </div>

        </article>

        <!--BEGIN #entry-related-wrap -->
        <section id="entry-related" class="clearfix">

            <h3 class="deco">
                <span class="outer">
                    <span class="inner">栏目列表</span>
                </span>
            </h3>
            <ul class="clearfix">

                <li>
                    <div class="entry-thumb">
                        <a class="overlay" href="portfolio-single.html">
                            <img src="{{asset('resources/views/home/style/2012/04/3540114961_c009ce7d9e_b-320x320.jpg')}}" alt=""/>
                            <div class="caption"><span>查看</span></div>
                        </a>
                    </div>
                    <h4 class="entry-title"><a rel="bookmark" href="portfolio-single.html">领域技能</a></h4>

                </li>


                <li>
                    <div class="entry-thumb">
                        <a class="overlay" href="portfolio-single.html">
                            <img src="{{asset('resources/views/home/style/2012/04/2937630810_7513f565b8_o-320x320.jpg')}}" alt=""/>
                            <div class="caption"><span>查看</span></div>
                        </a>
                    </div>
                    <h4 class="entry-title"><a rel="bookmark" href="portfolio-single.html">时尚达人</a></h4>
                </li>


                <li>

                    <div class="entry-thumb">
                        <a class="overlay" href="portfolio-single.html">
                            <img src="{{asset('resources/views/home/style/2012/04/520385224_9a679aa1fb_b-320x320.jpg')}}" alt=""/>
                            <div class="caption"><span>查看</span></div>
                        </a>
                    </div>
                    <h4 class="entry-title"><a rel="bookmark" href="portfolio-single.html">心情随笔</a></h4>

                </li>

                <li>

                    <div class="entry-thumb">
                        <a class="overlay" href="portfolio-single.html">
                            <img src="{{asset('resources/views/home/style/2012/04/2790823073_88b6f8b2b0_o-320x320.jpg')}}" alt=""/>
                            <div class="caption"><span>查看</span></div>
                        </a>
                    </div>
                    <h4 class="entry-title"><a rel="bookmark" href="portfolio-single.html">饕餮美食</a></h4>


                </li>
                <li>
                    <div class="entry-thumb">
                        <a class="overlay" href="portfolio-single.html">
                            <img src="{{asset('resources/views/home/style/2012/04/2568010272_08b147a4bb_o-320x320.jpg')}}" alt=""/>
                            <div class="caption"><span>查看</span></div>
                        </a>
                    </div>
                    <h4 class="entry-title"><a rel="bookmark" href="portfolio-single.html">玩乐趣享</a></h4>

                </li>

                <li>
                    <div class="entry-thumb">
                        <a class="overlay" href="portfolio-single.html">
                            <img src="{{asset('resources/views/home/style/2012/04/3306770768_042408e4a6_o-320x320.png')}}" alt=""/>
                            <div class="caption"><span>查看</span></div>
                        </a>
                    </div>
                    <h4 class="entry-title"><a rel="bookmark" href="portfolio-single.html">其它</a></h4>
                </li>


            </ul>
            <!--END #entry-related-wrap -->
        </section>

    </section>
    <!-- #content -->
</div>
<!-- /#primary -->




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
@endsection