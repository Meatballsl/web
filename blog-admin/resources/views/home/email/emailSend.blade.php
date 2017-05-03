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
            <a href="{{url('home/person')}}" class="made-with-pk">

                <div class="made-with">返回<strong>个人主页</strong></div>
            </a>
            <!-- #content -->


            <div style="color: #0d3625">
                @if(session('msg'))
                    {{session('msg')}}
                @endif
            </div>

            @if(session("success"))
                {{session('success')}}
                <div style="color: #b6a338">
                    <span id="totalSecond">5</span>s后将跳转到个人主页，若没响应，请点击<a href="{{url('home/person')}}">这里</a>
                </div>

                <script>
                    var second = totalSecond.innerText;
                    setInterval("redirect()", 1000);
                    function redirect() {
                        totalSecond.innerText = --second;
                        if (second <= 0) location.href = "{{url('home/person')}}";
                    }

                </script>
            @endif


        </div>

@endsection