<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <meta name="keywords"
          content="Flat Dark Web Login Form Responsive Templates, Iphone Widget Template, Smartphone login forms,Login form, Widget Template, Responsive Templates, a Ipad 404 Templates, Flat Responsive Templates"/>
    <link href="{{asset('resources/views/home/register/css/style.css')}}" rel='stylesheet' type='text/css'/>

    <script src="{{asset('resources/views/admin/style/js/1.7.1/jquery.min.js')}}" type="text/javascript"></script>

</head>
<body>
<script>$(document).ready(function (c) {
        $('.close').on('click', function (c) {
            $('.login-form').fadeOut('slow', function (c) {
                $('.login-form').remove();
            });
        });
    });
</script>
<!--SIGN UP-->
<h1>klasikal Login Form</h1>
<div class="login-form">
    <div class="close"></div>
    <div class="head-info">
        <label class="lbl-1"> </label>
        <label class="lbl-2"> </label>
        <label class="lbl-3"> </label>
    </div>
    <div class="clear"></div>
    <div class="avtar">
        <img src="{{asset('resources/views/home/register/images/avtar.png')}}"/>
    </div>
    @if(count($errors)>0)
        @foreach($errors->all() as $val)
            <div class="mark">{{$val}}</div>
        @endforeach
    @endif

    @if(session('success'))
        {{session('success')}}
    @endif
    <form action="{{url('/register')}}" method="post">

        {{csrf_field()}}
        <input type="text" class="login" name="user_login">
        <input type="text" class="email" name="user_email">

        <div class="key">
            <input type="password" name="password">

        </div>

        <div class="key">
            <input type="password" name="password_confirmation">
        </div>
        <div class="signin">
            <input type="submit" value="Login">
        </div>
    </form>

</div>

</body>
</html>








