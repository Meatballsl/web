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
                        <h2 class="heading">置顶文章</h2>
                        <div class="content">

                            <div class="item featured text-center">
                                <h3 class="title"><a
                                            href="http://themes.3rdwavemedia.com/website-templates/responsive-bootstrap-theme-for-products-velocity/"
                                            target="_blank">KickStarter - Velocity</a></h3>
                                <p class="summary">A responsive Bootstrap template designed for digital products</p>
                                <div class="featured-image">
                                    <a href="http://themes.3rdwavemedia.com/website-templates/responsive-bootstrap-theme-for-products-velocity/"
                                       target="_blank">
                                        <img class="img-responsive project-image"
                                             src="{{asset('resources/views/home/person/assets/images/projects/project-featured.png')}}"
                                             alt="project name"/>
                                    </a>
                                    <div class="ribbon">
                                        <div class="text">New</div>
                                    </div>
                                </div>

                                <div class="desc text-left">
                                    <p>You can promote your main project here. Suspendisse in tellus dolor. Vivamus a
                                        tortor eu turpis pharetra consequat quis non metus. Aliquam aliquam, orci eu
                                        suscipit pellentesque, mauris dui tincidunt enim, eget iaculis ante dolor non
                                        turpis.</p>
                                    <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit
                                        laboriosam, nisi ut aliquid ex ea commodi consequatur. At vero eos et accusamus
                                        et iusto odio dignissimos ducimus.</p>
                                </div><!--//desc-->

                                @if($myUser->id===$user->id)
                                <a class="btn btn-cta-secondary"
                                   href="{{url('home/article')}}"
                                   ><i class="fa fa-thumbs-o-up"></i> 发表文章</a>
                                    @else
                                    <a class="btn btn-cta-secondary"
                                       href="{{route('myself_blog',['userblog',$user->id])}}"
                                       ><i class="fa fa-thumbs-o-up"></i>查看文章</a>
                                    @endif
                            </div><!--//item-->
                            <hr class="divider"/>


                        </div><!--//content-->
                    </div><!--//section-inner-->
                </section><!--//section-->


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
                                </li>
                                <li><i class="fa fa-link"></i><span class="sr-only">qq:</span><a href="#">{{$user->qq}}</a>
                                </li>
                            </ul>
                        </div><!--//content-->
                    </div><!--//section-inner-->
                </aside><!--//aside-->

                <aside class="skills aside section">
                    <div class="section-inner">
                        <h2 class="heading">留言板</h2>
                        <div class="content">
                            <p class="intro">
                                Intro about your skills goes here. Keep the list lean and only show your primary
                                skillset. You can always provide a link to your Linkedin or Coderwall profile so people
                                can get more info there.</p>


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
                        href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers
            </small>
        </div><!--//container-->
    </footer><!--//footer-->

    <!-- Javascript -->
</div>
</body>
</html> 

