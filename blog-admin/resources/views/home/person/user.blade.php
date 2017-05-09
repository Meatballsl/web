@include('home.person.common')

<body>
<div class="kk">
    <!-- ******HEADER****** -->
    @include('home.person.head')

    <div class="container sections-wrapper">
        <div class="row">


        </div><!--//primary-->
        <div class="secondary col-md-4 ">

            <aside class="list conferences aside section">
                <div class="section-inner">
                    <h2 class="heading"> {{$title}}</h2>
                    <div class="content">
                        <ul class="list-unstyled">
                            @foreach($users as $key=>$val)
                                <li><i class="fa fa-calendar"></i> <a href="{{ url('home/person', $val->id )}}"
                                    >{{ $val->user_nicename }}</a></li>
                            @endforeach
                        </ul>
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

