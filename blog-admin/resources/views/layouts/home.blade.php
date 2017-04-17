<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <title>Apollo</title>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('resources/views/admin/style/css/ch-ui.admin.css')}}">

    <link rel="stylesheet" type="text/css" media="all" href="{{asset('resources/views/home/style/css/style.css')}}"/>
    <link rel="stylesheet" type="text/css" media="all"
          href="{{asset('resources/views/home/style/css/responsive.css')}}"/>
    <!-- Google Font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic' rel='stylesheet'
          type='text/css'>
    <!--[if lt IE 9]>
    <script src="{{asset('resources/views/home/style/js/html5.js')}}" type="text/javascript"></script>
    <![endif]-->
    <script type="text/javascript" src="{{asset('resources/views/home/style/js/jquery-1.7.2.min.js')}}"></script>
</head>


@yield('body_name')
<div id="site-container">

    <!-- #header-top -->
    <div id="header-top" class="clearfix">
        <div class="left"> T. 05468 951332 | E. info@apollo.com</div>

        <!-- #social -->
        <ul id="social" class="clearfix">
            <li class="twitter"><a href="http://sc.chinaz.com">Twitter</a></li>
            <li class="facebook"><a href="http://sc.chinaz.com">Facebook</a></li>
            <li class="google"><a href="#">Google+</a></li>
            <li class="dribbble"><a href="#">Dribbble</a></li>
            <li class="vimeo"><a href="#">Vimeo</a></li>
            <li class="skype"><a href="#">Skype</a></li>
            <li class="rss"><a href="http://sc.chinaz.com">RSS</a></li>
        </ul>
        <!-- /#social -->

    </div>
    <!-- /#header-top -->

    <!-- #header -->
    <header id="header" class="clearfix">
        <!-- #logo -->
        <div id="logo">
            <h1><a href="index.html"> <img alt="Apollo" src="{{asset('resources/views/home/style/2012/04/apollo-logo.png')}}"></a>
            </h1>
        </div>
        <!-- /#logo -->
        <!-- #primary-nav -->
        <nav id="primary-nav" role="navigation" class="clearfix">
            <ul id="menu-primary-nav" class="nav sf-menu clearfix">
                <li @if($check=='index')class="current-menu-item" @endif
                ><a href="{{url('/index')}}">首页</a></li>

                <li @if($check=='cate')class="current-menu-item" @endif
                ><a href="{{url('/cate')}}">分类专栏</a></li>

                <li @if($check=='auther')class="current-menu-item" @endif
                ><a href="{{url('/auther')}}">作家专栏</a></li>

                <li @if($check=='index')class="current-menu-item" @endif
                ><a href="#">在线聊天室</a></li>

                <li @if($check=='blog')class="current-menu-item" @endif
                ><a href="{{url('/blog')}}">我的博客</a></li>

            </ul>

        </nav>
        <!-- #primary-nav -->

    </header>

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

                <li><a href="{{url('/cate')}}">分类专栏</a></li>
                <li><a href="{{url('/auther')}}">作家专栏</a></li>
                <li><a href="discuss.html">在线聊天室</a></li>
                <li><a href="{{url('/blog')}}">我的博客</a></li>
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