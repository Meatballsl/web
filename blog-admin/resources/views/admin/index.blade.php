@extends('layouts.admin')
@section('content')
<!--头部 开始-->
<div class="top_box">
	<div class="top_left">
		<div class="logo"> 博客后台管理</div>
		<ul>
			<li><a href="{{asset('admin/index')}}" class="active">首页</a></li>
			<li><a href="#">管理页</a></li>
		</ul>
	</div>
	<div class="top_right">
		<ul>
			<li>管理员：{{session('user')->name}}</li>
			<li><a href="{{url('admin/pass')}}" target="main">修改密码</a></li>
			<li><a href="{{url('admin/quit')}}">退出</a></li>
		</ul>
	</div>
</div>
<!--头部 结束-->

<!--左侧导航 开始-->
<div class="menu_box">
	<ul>
		<li>
			<h3><i class="fa fa-fw fa-clipboard"></i>文章管理</h3>
			<ul class="sub_menu">
				<li><a href="{{url('admin/cate')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>分类管理</a></li>
				<li><a href="{{url('admin/article')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>文章管理</a></li>
				<li><a href="{{url('admin/comment')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>评论管理</a></li>
				<li><a href="{{url('admin/reply')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>回复管理</a></li>

			</ul>
		</li>
		<li>
			<h3><i class="fa fa-fw fa-comment"></i>话题管理</h3>
			<ul class="sub_menu">
				<li><a href="{{url('admin/topic')}}" target="main"><i class="fa fa-fw fa-cubes"></i>话题管理</a></li>
				<li><a href="{{url('admin/follower')}}" target="main"><i class="fa fa-fw fa-database"></i>跟帖管理</a></li>
				<li><a href="{{url('admin/followerComment')}}" target="main"><i class="fa fa-fw fa-database"></i>回复管理</a></li>
			</ul>
		</li>
		<li>
			<h3><i class="fa fa-fw fa-male"></i>会员管理</h3>
			<ul class="sub_menu">
				<li><a href="{{url('admin/user')}}" target="main"><i class="fa fa-fw fa-child"></i>会员管理</a></li>
				<li><a href="{{url('admin/column_vefify')}}" target="main"><i class="fa fa-fw fa-pencil"></i>专栏管理</a></li>
			</ul>
		</li>
		<li>
			<h3><i class="fa fa-fw fa-thumb-tack"></i>权限管理</h3>
			<ul class="sub_menu">
				<li><a href="{{url('admin/admin_user')}}" target="main"><i class="fa fa-fw fa-female"></i>管理员管理</a></li>
				<li><a href="{{url('admin/role')}}" target="main"><i class="fa fa-fw fa-spoon"></i>角色管理</a></li>

			</ul>
		</li>
		<li>
			<h3><i class="fa fa-fw fa-institution"></i>应用库</h3>
			<ul class="sub_menu">
				<li><a href="http://www.yeahzan.com/fa/facss.html" target="main"><i class="fa fa-fw fa-font"></i>图标调用</a></li>
				<li><a href="http://hemin.cn/jq/cheatsheet.html" target="main"><i class="fa fa-fw fa-chain"></i>Jquery手册</a></li>
				<li><a href="http://tool.c7sky.com/webcolor/" target="main"><i class="fa fa-fw fa-tachometer"></i>配色板</a></li>
				<li><a href="element.html" target="main"><i class="fa fa-fw fa-tags"></i>其他组件</a></li>
			</ul>
		</li>
	</ul>
</div>
<!--左侧导航 结束-->

<!--主体部分 开始-->
<div class="main_box">
	<iframe src="{{url('admin/info')}}" frameborder="0" width="100%" height="100%" name="main"></iframe>
</div>
<!--主体部分 结束-->

<!--底部 开始-->
<div class="bottom_box">
	CopyRight © 2017. Powered By <a href="">http://www..com</a>.
</div>
<!--底部 结束-->
@endsection

