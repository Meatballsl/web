@extends('layouts.home')

@section('body_name')
    <body id="body" class="portfolio-single">
    @endsection


    @section('body_part')
        <!-- /#header -->
        <!-- #primary -->
        <div id="primary" class="clearfix">

            <!-- #content -->
            <section id="content" role="main" class="fullwidth">
                <div id="feature" class="clearfix">
                    <div id="callout">
                        <h2>程序员1月书讯</h2>
                        <p>12月书讯中奖名单：</p>

                        <p>xu_chenyang《精简：无印良品与品牌理念打造》
                            松阳《通关！游戏设计之道（第2版）》
                            xiaerwoailuo《Python科学计算基础教程》
                            SunnyYoona《数据架构：大数据、数据仓库以及Data Vault》
                            丁国华《设计的细节：日本经典设计透析》</p>
                        <p>1月新书10本， 涉及Android开发、算法、编程语言Java/Python/R、日系网络/设计模式/性能优化入门书、软件开发、UX。大多数网店都已到货，后附购买链接。</p>


                        <p><a href="#">View Our Work &rarr;</a></p>
                    </div>
                    <div id="hpslider" class="flexslider">
                        <script type="text/javascript" charset="utf-8">
                            jQuery(window).load(function () {
                                jQuery('#hpslider').flexslider({
                                    keyboardNav: false,
                                    prevText: "&lt;",
                                    nextText: "&gt;"
                                });
                            });
                        </script>
                        <ul class="slides">
                            <li><img src="{{asset('resources/views/home/style/2012/04/slider06-600x300.jpg')}}" alt=""/>
                            </li>
                            <li><img src="{{asset('resources/views/home/style/2012/04/slider05-600x300.jpg')}}" alt=""/>
                                <p class="flex-caption">You can add as many slides as you want, with and without
                                    captions. Win!</p>
                            </li>
                            <li><img src="{{asset('resources/views/home/style/2012/04/slider07-600x300.jpg')}}" alt=""/>
                            </li>
                        </ul>
                    </div>
                </div>


                <div id="home-blocks" class="clearfix">
                    <h3 class="deco"><span class="outer"><span class="inner">推荐文章</span></span></h3>
                    <ul class="clearfix">
                        @foreach($recomment as $key=>$val)
                        <li>
                            <h3><a href="{{url('article',$val['id'])}}">{{$val['title']}}</a></h3>
                            <p>{{$val['summary']}}</p>
                        </li>
                      @endforeach
                    </ul>
                </div>
                <div id="home-portfolio" class="clearfix">
                    <h3 class="deco"><span class="outer"><span class="inner">精选分类</span></span></h3>
                    <ul class="clearfix">
                        @foreach($cate as $key=>$val)
                        <li class="st_portfolio hentry">
                            <div class="entry-thumb">
                                <a class="overlay" href="{{url('/cate/'.$val['id'])}}">
                                    <img src="{{$val['thumb']}}"
                                         alt=""/>
                                    <div class="caption">
                                        <span>查看</span>
                                    </div>
                                </a>
                            </div>

                            <h2 class="entry-title">
                                <a rel="bookmark" href="portfolio-single.html">{{$val['name']}}</a>
                            </h2>

                            <div class="entry-content">
                                <p>{{$val['title']}}</p>
                            </div>

                        </li>
                      @endforeach
                    </ul>
                </div>
                <div id="home-blog" class="clearfix">
                    <h3 class="deco"><span class="outer"><span class="inner">博客社区</span></span></h3>
                    <ul class="clearfix">
                        <li class="post format-standard hentry">
                            <div class="entry-thumb"><a class="overlay" href="blog-single.html"> <img
                                            src="{{asset('resources/views/home/style/2012/04/dsc00033bb-320x320.jpg')}}"
                                            alt=""/>
                                    <div class="caption"><span>查看</span></div>
                                </a></div>
                            <h2 class="entry-title"><a rel="bookmark" href="blog-single.html"> 二手小市场</a></h2>
                            <div class="entry-content"> 拒绝浪费，将你的闲置利用来，转手给更加需要的人。本平台仅提供展示与交流平台，交易方式由买卖双方自行沟通协商解决。</div>
                        </li>
                        <li class="post format-gallery hentry">
                            <div class="entry-thumb"><a class="overlay" href="blog-single.html"> <img
                                            src="{{asset('resources/views/home/style/2012/04/snow_environment_concept1-320x320.jpg')}}"
                                            alt=""/>
                                    <div class="caption"><span>查看</span></div>
                                </a></div>
                            <h2 class="entry-title"><a rel="bookmark" href="blog-single.html">结伴约约约</a></h2>
                            <div class="entry-content">今天你孤单了嘛？想有个伴一起健身跑步、一起吃火锅、一起看电影……发布你的孤单，让小伙伴们一起驱赶孤独，让生活有趣起来。</div>
                        </li>
                        <li class="post format-audio hentry">
                            <div class="entry-thumb-placeholder audio"><a class="overlay" href="blog-single.html">
                                    <div class="caption"><span>查看</span></div>
                                </a></div>
                            <h2 class="entry-title"><a rel="bookmark" href="blog-single.html">今日我做主</a></h2>
                            <div class="entry-content">一段心情语录、一首歌，也许就能收获一位知音、一票粉丝，讲你所讲、唱你所爱，你的声音将被所有人听到</div>
                        </li>
                        <li class="post format-chat hentry last">
                            <div class="entry-thumb-placeholder chat"><a class="overlay" href="blog-single.html">
                                    <div class="caption"><span>查看</span></div>
                                </a></div>
                            <h2 class="entry-title"><a rel="bookmark" href="blog-single.html">疑难问答</a></h2>
                            <div class="entry-content"> 生活中遇到一些问题，没关系，提出来，让网友们帮你出谋献策，愉快解决。</div>
                        </li>
                    </ul>
                </div>
            </section>
            <!-- /#content -->
        </div>



        <!-- /#container -->
        {{--<script>--}}
            {{--var getElementsByClassName = function (a, b, c) {--}}
                        {{--if (document.getElementsByClassName) {--}}
                            {{--getElementsByClassName = function (a, b, c) {--}}
                                {{--c = c || document;--}}
                                {{--var d = c.getElementsByClassName(a), e = b ? new RegExp("\\b" + b + "\\b", "i") : null, f = [], g;--}}
                                {{--for (var h = 0, i = d.length; h < i; h += 1) {--}}
                                    {{--g = d[h];--}}
                                    {{--if (!e || e.test(g.nodeName)) {--}}
                                        {{--f.push(g)--}}
                                    {{--}--}}
                                {{--}--}}
                                {{--return f--}}
                            {{--}--}}
                        {{--} else if (document.evaluate) {--}}
                            {{--getElementsByClassName = function (a, b, c) {--}}
                                {{--b = b || "*";--}}
                                {{--c = c || document;--}}
                                {{--var d = a.split(" "), e = "", f = "http://www.w3.org/1999/xhtml", g = document.documentElement.namespaceURI === f ? f : null, h = [], i, j;--}}
                                {{--for (var k = 0, l = d.length; k < l; k += 1) {--}}
                                    {{--e += "[contains(concat(' ', @class, ' '), ' " + d[k] + " ')]"--}}
                                {{--}--}}
                                {{--try {--}}
                                    {{--i = document.evaluate(".//" + b + e, c, g, 0, null)--}}
                                {{--} catch (m) {--}}
                                    {{--i = document.evaluate(".//" + b + e, c, null, 0, null)--}}
                                {{--}--}}
                                {{--while (j = i.iterateNext()) {--}}
                                    {{--h.push(j)--}}
                                {{--}--}}
                                {{--return h--}}
                            {{--}--}}
                        {{--} else {--}}
                            {{--getElementsByClassName = function (a, b, c) {--}}
                                {{--b = b || "*";--}}
                                {{--c = c || document;--}}
                                {{--var d = a.split(" "), e = [], f = b === "*" && c.all ? c.all : c.getElementsByTagName(b), g, h = [], i;--}}
                                {{--for (var j = 0, k = d.length; j < k; j += 1) {--}}
                                    {{--e.push(new RegExp("(^|\\s)" + d[j] + "(\\s|$)"))--}}
                                {{--}--}}
                                {{--for (var l = 0, m = f.length; l < m; l += 1) {--}}
                                    {{--g = f[l];--}}
                                    {{--i = false;--}}
                                    {{--for (var n = 0, o = e.length; n < o; n += 1) {--}}
                                        {{--i = e[n].test(g.className);--}}
                                        {{--if (!i) {--}}
                                            {{--break--}}
                                        {{--}--}}
                                    {{--}--}}
                                    {{--if (i) {--}}
                                        {{--h.push(g)--}}
                                    {{--}--}}
                                {{--}--}}
                                {{--return h--}}
                            {{--}--}}
                        {{--}--}}
                        {{--return getElementsByClassName(a, b, c)--}}
                    {{--},--}}
                    {{--dropdowns = getElementsByClassName('dropdown-menu');--}}
            {{--for (i = 0; i < dropdowns.length; i++)--}}
                {{--dropdowns[i].onchange = function () {--}}
                    {{--if (this.value != '') window.location.href = this.value;--}}
                {{--}--}}
        {{--</script>--}}


@endsection