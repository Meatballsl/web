@include('home.person.common')

<body>
<div class="kk">
    <!-- ******HEADER****** -->
   @include('home.person.head')

    <div class="container sections-wrapper">
        <div class="row">
            <div class="primary col-md-4 ">


                <section class="latest section">
                    <div class="section-inner">
                         @if(!$topArticle)
                            <h2 class="heading">暂无发表文章</h2>
                        @else
                        <h2 class="heading">置顶文章</h2>
                        <div class="content">

                            <div class="item featured text-center">
                                <h3 class="title"><a
                                            href="{{url('/article',$topArticle->id)}}">{{$topArticle->title}}</a></h3>
                                <p class="summary"></p>
                                <div class="featured-image">
                                    <a href="{{url('/article',$topArticle->id)}}">
                                        <img class="img-responsive project-image " src="/{{$topArticle->thumb}}"/>
                                    </a>
                                    <div class="ribbon">
                                        <div class="text">Top</div>
                                    </div>
                                </div>

                                <div class="desc text-left">
                                    <p>{{$topArticle->summary}}</p>

                                </div><!--//desc-->

                                @if($myUser->id===$user->id)
                                <a class="btn btn-cta-secondary"
                                   href="{{url('home/article')}}"
                                   ><i class="fa fa-thumbs-o-up"></i> 发表文章</a>
                                    @else
                                    <a class="btn btn-cta-secondary"
                                       href="{{route('myself_blog',['userblog',$user->id])}}"
                                       ><i class="fa fa-thumbs-o-up"></i>所有文章</a>
                                    @endif
                            </div><!--//item-->

                            <hr class="divider"/>


                        </div><!--//content-->
                             @endif
                    </div><!--//section-inner-->
                </section><!--//section-->

                @if($myUser->id===$user->id)


                <div>
                <img src="{{asset('resources/views/home/style/images/Hotel.png')}}">
                    <a href="{{url('home/article')}}">我的文章</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="{{asset('resources/views/home/style/images/05.png')}}">
                    <a href="{{url('home/collect',$user->id)}}">我的收藏</a>
                </div>
                @endif

            </div><!--//primary-->
            <div class="secondary col-md-4 ">
                @include('home.person.stats')
                <aside class="info aside section">
                    <div class="section-inner">
                        <h2 class="heading sr-only">Basic Information</h2>
                        <div class="content">
                            <ul class="list-unstyled">
                                <li><i class="fa fa-map-marker"></i><span class="sr-only">Location:</span>{{$user->state}}{{$user->city}}{{$user->region}},{{$user->country}}
                                </li>
                                <li><i class="fa fa-envelope-o"></i><span class="sr-only">Email:</span><a href="#">{{$user->user_email}}</a>
                                    @if($user->user_status!==3)（<a href="{{url('home/email')}}">请绑定邮箱</a>）@endif
                                </li>
                                <li><i class="fa fa-link"></i><span class="sr-only">qq:</span><a href="#">{{$user->qq}}</a>
                                </li>
                            </ul>
                        </div><!--//content-->
                    </div><!--//section-inner-->
                </aside><!--//aside-->

                <aside class="skills aside section">
                    <div class="section-inner">
                        <h2 class="heading"><a href="{{url('home/message',$user->id)}}">留言板</a></h2>
                        <div class="content">
                            <p class="intro">
                               请在我的留言板畅所欲言</p>


                        </div><!--//content-->
                    </div><!--//section-inner-->
                </aside><!--//section-->


            </div><!--//secondary-->
        </div><!--//row-->
    </div><!--//masonry-->

    <!-- ******FOOTER****** -->
    <footer class="footer">
        <div class="container text-center">
            <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can check out other license options via our website: themes.3rdwavemedia.com */-->
            <small class="copyright">Designed with <i class="fa fa-heart"></i> by <a
                        href="" target="_blank">Lishanling</a>
            </small>
        </div><!--//container-->
    </footer><!--//footer-->

    <!-- Javascript -->
</div>
</body>
</html> 

