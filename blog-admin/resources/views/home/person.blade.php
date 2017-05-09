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

            @if(session("msg"))
                {{session('msg')}}
            @endif


            <div>

                @if($user->user_status==3)
                    <a href="">你的会员等级为三级，棒棒</a>
                @endif

                @if($user->user_status==2)
                    <a href="{{url('home/email')}}">请绑定邮箱</a>
                @endif

                @if($user->user_status==1)
                    <a href="{{url('home/info/create')}}">请先完善个人信息</a>
                @endif

            </div>
            <div><a href="{{url('home/article')}}">文章列表</a></div>
            <div><a href="{{url('home/quit')}}">退出</a></div>
            <!-- /#content -->
        </div>
        @include('home.person.stats')



        <div id="follow_form">

            <form action="{{ route('followers.store', $user->id) }}" method="post">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-sm btn-primary">关注</button>
            </form>

            <form action="{{ route('followers.destroy', $user->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-sm">取消关注</button>
            </form>


        </div>



@endsection