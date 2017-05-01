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
  <h5>绑定邮箱后，您可以使用邮箱登陆，会员权限提升，享受更多福利</h5>
  <form action="{{url('home/email')}}">
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{$user['user_email']}}" name="user_email">
    </div>
    <div style="color: #d62728">
      @if(session('msg'))
        {{session('msg')}}
        @endif
    </div>
    <input type="submit" class="btn btn-default">

  </form>


</div>

@endsection