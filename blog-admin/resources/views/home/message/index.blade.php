@include('home.person.common')

<body>
<div class="kk">
    <!-- ******HEADER****** -->
    <div class="header">
        <div class="container">
            <div class="col-lg-offset-7">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span> <a href="{{url('index')}}">首页</a>
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span> <a>主页</a>
            </div>
            {{--封面--}}
            <div class="container sections-wrapper">

                <div class="primary col-md-8  ">


                    <section class="latest section">
                        <div class="section-inner">

                            <div class="content">

                                <div class="item featured text-center">
                                    <h3 class="title"><a
                                                href="http://themes.3rdwavemedia.com/website-templates/responsive-bootstrap-theme-for-products-velocity/"
                                                target="_blank">lishanling的留言板</a></h3>
                                    <p class="summary"></p>
                                    <div class="featured-image">
                                        <a>
                                            <img class="img-responsive project-image"
                                                 src="{{asset('resources/views/home/person/assets/images/projects/project-featured.png')}}"
                                                 alt="project name"/>
                                        </a>

                                    </div>

                                    <div class="desc text-left">
                                        <p>fsfsfsfdsdf</p>

                                    </div><!--//desc-->


                                </div><!--//item-->
                                <hr class="divider"/>
                                {{--列表--}}
                                <div class="item row">
                                    <div  class="col-md-3 ">

                                        <div  class="item" >
                                           <a > <img class="img-responsive img-circle "
                                                 src="{{asset('resources/views/home/style/2012/04/2937630810_7513f565b8_o-320x320.jpg')}}" width="100px" alt="James Lee"/>
                                           </a>
                                        </div>


                                        <div  class="item">
                                            <h4 class="col-md-offset-1title">lishanling</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div  class="item" >2013-2-1 1:3:45</div>
                                        <div class="item" >
                                            <p>kjfhgakldjfhglskdhfgklsdhfgkljhsdlkfghjsldjhfglksjdhfgl
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item row">
                                    <div  class="col-md-3 ">

                                        <div  class="item" >
                                            <a > <img class="img-responsive img-circle "
                                                      src="{{asset('resources/views/home/style/2012/04/2937630810_7513f565b8_o-320x320.jpg')}}" width="100px" alt="James Lee"/>
                                            </a>
                                        </div>


                                        <div  class="item">
                                            <h4 class="col-md-offset-1title">lishanling</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div  class="item" >2013-2-1 1:3:45</div>
                                        <div class="item" >
                                            <p>kjfhgakldjfhglskdhfgklsdhfgkljhsdlkfghjsldjhfglksjdhfgl
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                {{--列表完--}}


                            </div><!--//content-->
                        </div><!--//section-inner-->
                    </section><!--//section-->

                    <section class="latest section">
                        <div class="section-inner">

                            <div class="content">

                                <div class="item featured text-center">
                                    <h3 class="title"><a
                                                href="http://themes.3rdwavemedia.com/website-templates/responsive-bootstrap-theme-for-products-velocity/"
                                                target="_blank">lishanling的留言板</a></h3>
                                </div>



                            </div><!--//content-->
                        </div><!--//section-inner-->
                    </section><!--//section-->


                </div><!--//primary-->

            </div>
        {{--封面完--}}

              {{--评论表单--}}






               {{--评论表单完--}}

        <!-- Javascript -->
        </div>


    </div>
</div>
</body>
</html> 

