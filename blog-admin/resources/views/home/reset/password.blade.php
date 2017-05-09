@extends('layouts.home')

@section('body_name')
    <body id="body" class="blog-single">
    @endsection

    @section('body_part')
        <link href="{{asset('resources/org/bootstrap-datetimepicker/sample in bootstrap v3/bootstrap/css/bootstrap.min.css')}}"
              rel="stylesheet"/>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">重置密码</div>
                        <div class="panel-body">

                            <form method="POST" action="{{url('password/email') }}">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label class="col-md-4 control-label">邮箱地址：</label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="user_email">
                                    </div>
                                </div>
                                @if(session()->has('msg'))
                                    <h5 class="col-md- col-md-offset-4 text-danger">{{session('msg')}}</h5>
                                @endif
                                <div class="form-group ll">
                                    <div class="col-md-6 ">
                                        <button type="submit" class="btn btn-primary">
                                            重置
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection