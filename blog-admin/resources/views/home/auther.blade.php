@extends('layouts.home')

@section('body_name')
    <body id="body" class="portfolio">
    @endsection

    @section('body_part')


        <!-- #page-header -->
        <!---->
        <!-- /#page-header -->

        <!-- #primary -->
        <div id="primary">
            <!-- #content -->
            <section id="content" role="main" class="fullwidth clearfix">
                <div id="portfolio-wrapper" class="clearfix isotope">
                    @foreach($authers->all() as $key=>$val)
                    <article class="st_portfolio hentry artwork isotope-item">
                        <div class="entry-thumb">
                            <a class="overlay" href="{{url('home/blog/auther/'.$val['id'])}}">
                                <img src="{{$val['avatar']}}"
                                     alt=""/>
                                <div class="caption"><span>
         阅读他的文章</span></div>
                            </a>
                        </div>
                        <h2 class="entry-title"><a rel="bookmark" href="{{route('myself_blog',['auther',$val['id']])}}">
                                {{$val['user_nicename']}}</a></h2>
                        <div class="entry-content">

                            <p>{{$val['signature']}}</p>

                        </div>

                    </article>
                   @endforeach


                    <!--artwork sketches t-shirt-design  character-design -->
                </div>
            </section>
            <!-- /#content -->

            @if(session('user'))
                @if(session('user')->is_column===0)
                    <div style="margin-left: 760px">
                        <img src="{{asset('resources/views/home/style/images/notebook.png')}}">
                        <h3 style="color: #99cb84"><a onclick="column()">申请成为专栏作家</a></h3>
                    </div>

                    @elseif(session('user')->is_column===2)
                        <div style="margin-left: 760px">
                            <img src="{{asset('resources/views/home/style/images/notebook.png')}}">
                            <h3 style="color: #99cb84">您的专栏申请正在审核中</h3>
                        </div>
                    @endif
            @endif
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
                            var d = c.getElementsByClassName(a), e = b ? new RegExp("\\b" + b + "\\b", "i") : null, f = [],
                                g;
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
                            var d = a.split(" "), e = "", f = "http://www.w3.org/1999/xhtml",
                                g = document.documentElement.namespaceURI === f ? f : null, h = [], i, j;
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
                            var d = a.split(" "), e = [], f = b === "*" && c.all ? c.all : c.getElementsByTagName(b), g,
                                h = [], i;
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
        <script>
            function column() {
                layer.msg("您的申请已经提交");
                $.post(
                    "{{url('column')}}",
                    {

                        '_token': "{{csrf_token()}}",

                    },
                    function (data) {
                        setTimeout(function () {
                            location.href = location.href;
                        },3000)
                    }
                );
            }
        </script>
@endsection