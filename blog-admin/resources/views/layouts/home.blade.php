<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <title>UknowBlog</title>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('resources/views/admin/style/css/ch-ui.admin.css')}}">

    <link rel="stylesheet" type="text/css" media="all" href="{{asset('resources/views/home/style/css/style.css')}}"/>
    <link rel="stylesheet" type="text/css" media="all"
          href="{{asset('resources/views/home/style/css/responsive.css')}}"/>
    <!-- Google Font -->
    {{--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic' rel='stylesheet'--}}
    {{--type='text/css'>--}}

    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('resources/org/infoform/assets/img/apple-icon.png')}}"/>
    <link rel="icon" type="image/png" href="{{asset('resources/org/infoform/assets/img/favicon.png')}}"/>

    <link rel="stylesheet" href="{{asset('resources/org/ueditor/change.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('resources/org/uploadify/uploadify.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('resources/org/uploadify/upload.css')}}">


    <script type="text/javascript" src="{{asset('resources/views/home/style/js/jquery-1.7.2.min.js')}}"></script>


    <script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>

    <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.config.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.all.min.js')}}"></script>
    <script type="text/javascript" charset="utf-8"
            src="{{asset('resources/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>



</head>


@yield('body_name')
<div id="site-container">

    <!-- #header-top -->
    <div id="header-top" class="clearfix">
        <div class="left"> T. 0592 1111111 | E. info@UknowBlog.com</div>

        <!-- #social -->

        <!-- JiaThis Button BEGIN -->
        <div style="margin-left: 800px">
            @if(session('user'))
                用户：{{session('user')->user_login}}
                &nbsp;&nbsp;<a style="color: #f0f0f0" href="{{url('home/quit')}}">退出</a>
                @else
                <a style="color: #f0f0f0" href="{{url('/login')}}"> 登录 </a>
                &nbsp;&nbsp; <a style="color: #f0f0f0" target="_blank" href="{{url('/register')}}">注册</a>
                &nbsp;&nbsp; <a style="color: #f0f0f0"  href="{{url('/password/email')}}">忘记密码</a>
            @endif


        </div>



        <div id="ckepop" style="margin-left: 700px">

            <span class="jiathis_txt">分享到：</span>
            <a class="jiathis_button_tsina" style="color: #f0f0f0">新浪微博</a>
            <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank">更多</a>
            <a class="jiathis_counter_style"></a>
        </div>
        <script type="text/javascript" src="http://v2.jiathis.com/code/jia.js" charset="utf-8"></script>
        <!-- JiaThis Button END -->
        <!-- /#social -->

    </div>
    <!-- /#header-top -->

    <!-- #header -->
    <header id="header" class="clearfix">
        <!-- #logo -->
        <div id="logo">
            <h1><a href="{{url('/index')}}">
                    <img alt="Apollo" src="{{asset('resources/views/home/style/2012/04/uk.png')}}"></a>
            </h1>
        </div>
        <!-- /#logo -->
        <!-- #primary-nav -->
        <nav id="primary-nav" role="navigation" class="clearfix">
            <ul id="menu-primary-nav" class="nav sf-menu clearfix">
                <li @if($check=='index')class="current-menu-item" @endif
                ><a href="{{url('/index')}}">首页</a></li>

                <li @if($check=='cate')class="current-menu-item" @endif
                ><a href="{{url('/cate/1')}}">分类专栏</a></li>

                <li @if($check=='auther')class="current-menu-item" @endif
                ><a href="{{url('/auther')}}">作家专栏</a></li>

                @if(session('user'))
                    <li><a href="{{url('home/person/'.session('user')->id)}}">个人主页</a></li>
                @else
                    <li><a href="{{url('/login')}}">个人主页</a></li>
                @endif

                @if(session('user'))
                    <li @if($check=='blog') class="current-menu-item" @endif><a  href="{{route('myself_blog',['blog',session('user')->id])}}">我的博客</a></li>
                @else
                    <li @if($check=='blog') class="current-menu-item" @endif><a   href="{{url('/login')}}">我的博客</a></li>
                @endif

                <li @if($check=='topic') class="current-menu-item" @endif>
                    <a href="{{url('home/topic')}}">话题讨论</a>
                </li>
            </ul>

        </nav>
        <!-- #primary-nav -->

    </header>
    <div>
        @include('layouts.messages')
    </div>

@yield('body_part')

<!-- /#primary -->
    <!-- #footer -->
    <footer id="footer" class="clearfix">
        <div id="footer-widgets" class="clearfix">
            <div class="widget-first widget widget_text">
                <h4>关于我们</h4>
                <span class="div"></span>
                <div class="textwidget">本平台本着为网友们带来生活便利，为无聊的时候增加点小乐趣。<br/><br/>

                </div>
            </div>
            <div class="widget-2 widget st_tweet_widget">
                <h4>联系方式</h4>
                <span class="div"></span>
                389475917@qq.com
                <!--<ul id="twitter_update_list" class="clearfix">-->
                <!--<li>��</li>-->
                <!--</ul>-->
                <!--<script src="http://twitter.com/javascripts/blogger.js" type="text/javascript"></script> -->
                <!--<script src="http://twitter.com/statuses/user_timeline/swishthemes.json?callback=twitterCallback2&amp;count=2" type="text/javascript"></script> -->
            </div>
            <div class="widget-last widget st_flickr_widget">
                <h4>My Photostream</h4>
                <span class="div"></span>
                <div id="flickr_badge_wrapper" class="clearfix">
                <!--<script src="http://www.flickr.com/badge_code_v2.gne?count=8&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=52617155@N08" type="text/javascript"></script> -->
                </div>
            </div>
        </div>
    </footer>
    <!-- /#footer -->

    <!-- #footer-bottom -->
    <footer id="footer-bottom" class="clearfix">
        <nav id="footer-nav">
            <ul class="nav-footer">
                <li class="current-menu-item"><a href="{{url('/index')}}">首页</a></li>

                <li><a href="{{url('/cate/1')}}">分类专栏</a></li>
                <li><a href="{{url('/auther')}}">作家专栏</a></li>
                @if(session('user'))
                <li><a href="{{url('home/person/'.session('user')->id)}}">个人主页</a></li>
                @else
                    <li><a href="{{url('/login')}}">个人主页</a></li>
                @endif

                @if(session('user'))
                    <li><a href="{{route('myself_blog',['blog',session('user')->id])}}">我的博客</a></li>
                @else
                <li><a href="{{url('/login')}}">我的博客</a></li>
                @endif

                <li @if($check=='topic') class="current-menu-item" @endif>
                    <a href="{{url('home/topic')}}">话题讨论</a>
                </li>
            </ul>
        </nav>
        <div id="copyright">&copy; Copyright &copy; 2013.Company name All rights reserved.</div>
    </footer>
    <!-- /#footer-bottom -->
</div>
<script type="text/javascript" src="{{asset('resources/views/home/style/js/functions.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/views/home/style/js/jquery.flexslider-min.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/views/home/style/js/jquery.isotope.min.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/views/home/style/js/jquery.jplayer.min.js')}}"></script>
</body>
</html>