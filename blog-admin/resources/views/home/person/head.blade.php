<header class="header">
    <div class="container">
        <div class="col-md-12">
            <div class="col-md-6">
                <img class="profile-image img-circle pull-left"
                     src="/{{$user->avatar}}" width="140px" alt="James Lee"/>


                <div class="profile-content pull-left">
                    <h1 class="name">{{$user->user_nicename}}</h1>
                    <h2 class="desc">{{$user->signature}}</h2>
                    <ul class="social list-inline">
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-github-alt"></i></a></li>
                        <li class="last-item"><a href="#"><i class="fa fa-hacker-news"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                @if($myUser->id!==$user->id)

                    @if($myUser->isFollowing($user->id))

                        <form action="{{ route('followers.destroy', $user->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-sm">取消关注</button>
                        </form>

                    @else
                        <form action="{{ route('followers.store', $user->id) }}" method="post">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-sm btn-primary">关注</button>
                        </form>

                    @endif


                    @if(session("msg"))
                        {{session('msg')}}
                    @endif

                @endif
            </div>

        </div>

        <div class="col-md-12">

            <div class="col-md-6 col-md-offset-4">
                <div class="col-md-3">
                    <a href="{{url('home/person',$myUser->id)}}" class="btn btn-info">
                        <div class="made-with">返回<strong>个人主页</strong></div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{url('index')}}" class="btn btn-success">
                        <div class="made-with">返回<strong>首页</strong></div>
                    </a>
                </div>
                @if(session('user')->id==$user->id)
                    <div class="col-md-3">
                        <a href="{{url('home/quit')}}" class="btn btn-warning">
                            <div class="made-with">退出</div>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</header>