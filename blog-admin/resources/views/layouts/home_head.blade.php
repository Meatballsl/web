
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
                <h1><a href="index.html"> <img alt="Apollo" src="{$Think.const.STATIC_URL}/2012/04/apollo-logo.png"></a></h1>
            </div>
            <!-- /#logo -->
            <!-- #primary-nav -->
            <nav id="primary-nav" role="navigation" class="clearfix">
                <ul id="menu-primary-nav" class="nav sf-menu clearfix">
                    <li
                    <if condition="$choose eq index"> class="current-menu-item"</if>
                    ><a href="index.html">首页</a></li>

                    <li
                    <if condition="$choose eq classify"> class="current-menu-item"</if>
                    ><a href="{:U('home/Index/classify')}">分类专栏</a></li>
                    <li
                    <if condition="$choose eq auther"> class="current-menu-item"</if>
                    ><a href="{:U('home/Index/auther')}">作家专栏</a></li>
                    <li
                    <if condition="$choose eq chat"> class="current-menu-item"</if>
                    ><a href="discuss.html">在线聊天室</a></li>
                    <li
                    <if condition="$choose eq blog"> class="current-menu-item"</if>
                    ><a href="{:U('home/Index/blog')}">我的博客</a></li>
                </ul>

            </nav>
            <!-- #primary-nav -->

        </header>
