@extends('layouts.home')

@section('body_name')
<body id="body" class="blog-single">
@endsection

@section('body_part')
    <link href="{{asset('resources/org/reset/css/bootstrap.css')}}" rel="stylesheet"/>
    <link href="{{asset('resources/org/reset/css/bootstrapValidator.css')}}" rel="stylesheet"/>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">更新密码</div>
                    <div class="panel-body">

                        <form class="form-horizontal" id="form" method="POST" action="{{url('password/reset')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">邮箱：</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">密码：</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">确认密码：</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 ">
                                    <button id="btn" type="submit" class="btn btn-primary">
                                        更新密码
                                    </button>
                                </div>
                                @if(session('msg'))
                                <div class="col-md-6">
                                    {{session('msg')}}
                                </div>
                                    @endif
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{asset('resources/org/reset/js/jquery-1.10.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/org/reset/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/org/reset/js/bootstrapValidator.js')}}"></script>

@endsection