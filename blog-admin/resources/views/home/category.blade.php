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
                     src="/{{$cateDetail['show']}}"/>

            </div>

            <div class="entry-wrap">

                <h1 class="entry-title"><a href="#">{{$cateDetail['name']}}</a></h1>
                <span class="div"></span>
                <div class="entry-content">
                    {{$cateDetail['summary']}}
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
                @foreach($cateList as $key=>$val)
                <li>
                    <div class="entry-thumb">
                        <a class="overlay" href="{{url('/classify/')}}/{{$val['id']}}">
                            <img src="/{{$val['thumb']}}" alt=""/>
                            <div class="caption"><span>查看</span></div>
                        </a>
                    </div>
                    <h4 class="entry-title"><a rel="bookmark" href="{{url('/classify/')}}/{{$val['id']}}">{{$val['name']}}</a></h4>

                </li>
                    @endforeach




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