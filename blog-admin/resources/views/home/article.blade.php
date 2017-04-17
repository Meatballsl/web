@extends('layouts.home')

@section('body_name')
<body id="body" class="blog-single">
@endsection

@section('body_part')
<!-- #site-container -->

    <!-- /#header -->


    <!-- #page-header -->
    <div id="page-header">
        <h1>{{$article['title']}}</h1>
        <p>{{$article['summary']}}
    </div>
    <!-- /#page-header -->

    <!-- #primary -->
    <div id="primary" class="clearfix">
        <!-- #content -->
        <section id="content" role="main">
            <article class="post format-standard hentry clearfix">
                <div class="entry-meta ">

                    <div class="post-format">
                        <span class="icon"></span>
                    </div>


                    <ul>
                        <li><span>On</span> <time datetime="{{$article['created_at']}}">{{$article['created_at']}}</time></li>
                        <li><span>By</span> <a href="#" title="Posts by Chris Mooney" rel="author">{{$article['auther']}}</a></li>
                        <li><span>In</span> <a href="#">Quick Thoughts</a></li><li><span>With</span> <a href="#" title="Comment on The Martians had been repulsed">No Comments</a></li><li></li></ul>


                </div>
                <div class="entry-wrap">
                    <header class="entry-header">

                        <div class="entry-thumb">
                            <img src="{{$article['thumb']}}" alt=""  />
                        </div>

                    </header>

                    {!! $article['content'] !!}
                </div>
                <span class="div-end"></span> </article>







            <section id="respond" class="clearfix">


                <h3 id="respond-title" class="deco"><span class="outer"><span class="inner">评论区</span></span></h3>

                <article class="post format-standard hentry clearfix">

                    <div class="entry-meta ">
                        <div class="post-format"> <span class="icon"></span> </div>
                        <ul>
                            <li><span>On</span>
                                <time datetime="2012-04-18">April 18, 2012</time>
                            </li>
                            <li><span>By</span> <a href="#" title="Posts by Chris Mooney" rel="author">Chris Mooney</a></li>
                            <li><span>In</span> <a href="#">thinkphp 分布式数据库 详解 </a></li>
                            <li><span>With</span> <a href="blog-single.html#respond" title="Comment on The Martians had been repulsed">No Comments</a></li>
                        </ul>
                    </div>
                    <div class="entry-wrap">

                        <div class="entry-content">
                            <p>1.分布式数据库是什么：
                                　　tp的分布式数据库主要是通过该配置：
                                　　'DB_DEPLOY_TYPE'        =>  1,// 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
                            </p>
                            <p>2.主从服务器的读写分离是什么：
                                　主从数据库即为一个主数据库会有对应n个从数据库，而从数据库只能有一个对应的从数据库。主从数据库中写的操作需要使用主数据库，而读操作使用从数据库。主数据库与从数据库始终保持数据一致性。其中保持数据库一致的原理即为当主数据库数据发生变化时，会将操作写入到主数据库日志中，而从数据库会不停的读取主数据库的日志保存到自己的日志系统中，然后进行执行，从而保持了主从数据库一致。
                            </p>
                            <p>３.详解</p>
                        </div>

                    </div>
                </article>
                <article class="post format-standard hentry clearfix">

                    <div class="entry-meta ">
                        <div class="post-format"> <span class="icon"></span> </div>
                        <ul>
                            <li><span>On</span>
                                <time datetime="2012-04-18">April 18, 2012</time>
                            </li>
                            <li><span>By</span> <a href="#" title="Posts by Chris Mooney" rel="author">Chris Mooney</a></li>
                            <li><span>In</span> <a href="#">thinkphp 分布式数据库 详解 </a></li>
                            <li><span>With</span> <a href="blog-single.html#respond" title="Comment on The Martians had been repulsed">No Comments</a></li>
                        </ul>
                    </div>
                    <div class="entry-wrap">

                        <div class="entry-content">
                            <p>1.分布式数据库是什么：
                                　　tp的分布式数据库主要是通过该配置：
                                　　'DB_DEPLOY_TYPE'        =>  1,// 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
                            </p>
                            <p>2.主从服务器的读写分离是什么：
                                　主从数据库即为一个主数据库会有对应n个从数据库，而从数据库只能有一个对应的从数据库。主从数据库中写的操作需要使用主数据库，而读操作使用从数据库。主数据库与从数据库始终保持数据一致性。其中保持数据库一致的原理即为当主数据库数据发生变化时，会将操作写入到主数据库日志中，而从数据库会不停的读取主数据库的日志保存到自己的日志系统中，然后进行执行，从而保持了主从数据库一致。
                            </p>
                            <p>３.详解</p>
                        </div>

                    </div>
                </article>



                <form action="#" method="post" id="commentform">



                    <div class="field-row">
                        <textarea name="comment" id="comment" rows="6" tabindex="4"></textarea>
                    </div>

                    <input class="btn" type="submit" value="提交评论" id="submit" name="submit">

                </form>

            </section>
        </section>
        <!-- #content -->
        <!-- #sidebar -->
        <aside id="sidebar" role="complementary">
            <div class="widget-first widget widget_search clearfix"><form role="search" method="get" id="searchform" action="#">
                <input type="text" value="Search..." name="s" id="s" onblur="if (this.value == '')  {this.value = 'Search...';}" onfocus="if (this.value == 'Search...')
{this.value = '';}" />
            </form></div>
            <div class="widget-last widget widget_categories clearfix">
                <h4>栏目分类</h4>
                <ul>
                    <li><a href="#" title="View all posts filed under Art">领域技能</a> </li>
                    <li><a href="#" title="View all posts filed under Audio">时尚达人</a> </li>
                    <li><a href="#" title="View all posts filed under Link">心情随笔</a> </li>
                    <li><a href="#" title="View all posts filed under Quick Thoughts">饕餮美食</a> </li>
                    <li><a href="#" title="View all posts filed under Quotes">玩乐趣享</a> </li>
                    <li><a href="#" title="View all posts filed under Uncategorized">其它</a> </li>
                </ul>
            </div>
        </aside>
    </div>
    <!-- /#primary -->

    <!-- #footer -->

    <!-- /#footer-bottom -->

<!-- /#container -->
<script>
    var getElementsByClassName=function(a,b,c){if(document.getElementsByClassName){getElementsByClassName=function(a,b,c){c=c||document;var d=c.getElementsByClassName(a),e=b?new RegExp("\\b"+b+"\\b","i"):null,f=[],g;for(var h=0,i=d.length;h<i;h+=1){g=d[h];if(!e||e.test(g.nodeName)){f.push(g)}}return f}}else if(document.evaluate){getElementsByClassName=function(a,b,c){b=b||"*";c=c||document;var d=a.split(" "),e="",f="http://www.w3.org/1999/xhtml",g=document.documentElement.namespaceURI===f?f:null,h=[],i,j;for(var k=0,l=d.length;k<l;k+=1){e+="[contains(concat(' ', @class, ' '), ' "+d[k]+" ')]"}try{i=document.evaluate(".//"+b+e,c,g,0,null)}catch(m){i=document.evaluate(".//"+b+e,c,null,0,null)}while(j=i.iterateNext()){h.push(j)}return h}}else{getElementsByClassName=function(a,b,c){b=b||"*";c=c||document;var d=a.split(" "),e=[],f=b==="*"&&c.all?c.all:c.getElementsByTagName(b),g,h=[],i;for(var j=0,k=d.length;j<k;j+=1){e.push(new RegExp("(^|\\s)"+d[j]+"(\\s|$)"))}for(var l=0,m=f.length;l<m;l+=1){g=f[l];i=false;for(var n=0,o=e.length;n<o;n+=1){i=e[n].test(g.className);if(!i){break}}if(i){h.push(g)}}return h}}return getElementsByClassName(a,b,c)},
            dropdowns = getElementsByClassName( 'dropdown-menu' );
    for ( i=0; i<dropdowns.length; i++ )
        dropdowns[i].onchange = function(){ if ( this.value != '' ) window.location.href = this.value; }
</script>
<style>
    .result_content ul li span {
        font-size: 15px;
        padding: 6px 12px;
    }
</style>
@endsection