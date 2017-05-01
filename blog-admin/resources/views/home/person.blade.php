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
  <div>
    @if(session('user')->user_status==2)
      <a href="{{url('home/email')}}">请绑定邮箱</a>
    @else
    <a href="{{url('home/info/create')}}">请先完善个人信息</a>
      @endif
  </div>
    <div><a href="{{url('home/article')}}">文章列表</a></div>
    <div><a href="{{url('home/quit')}}" >退出</a></div>
  <!-- /#content --> 
</div>
<!-- /#primary -->
  <!-- #footer -->

  <!-- /#footer-bottom --> 
  

<!-- /#container --> 
<script>
		var getElementsByClassName=function(a,b,c){if(document.getElementsByClassName){getElementsByClassName=function(a,b,c){c=c||document;var d=c.getElementsByClassName(a),e=b?new RegExp("\\b"+b+"\\b","i"):null,f=[],g;for(var h=0,i=d.length;h<i;h+=1){g=d[h];if(!e||e.test(g.nodeName)){f.push(g)}}return f}}else if(document.evaluate){getElementsByClassName=function(a,b,c){b=b||"*";c=c||document;var d=a.split(" "),e="",f="http://www.w3.org/1999/xhtml",g=document.documentElement.namespaceURI===f?f:null,h=[],i,j;for(var k=0,l=d.length;k<l;k+=1){e+="[contains(concat(' ', @class, ' '), ' "+d[k]+" ')]"}try{i=document.evaluate(".//"+b+e,c,g,0,null)}catch(m){i=document.evaluate(".//"+b+e,c,null,0,null)}while(j=i.iterateNext()){h.push(j)}return h}}else{getElementsByClassName=function(a,b,c){b=b||"*";c=c||document;var d=a.split(" "),e=[],f=b==="*"&&c.all?c.all:c.getElementsByTagName(b),g,h=[],i;for(var j=0,k=d.length;j<k;j+=1){e.push(new RegExp("(^|\\s)"+d[j]+"(\\s|$)"))}for(var l=0,m=f.length;l<m;l+=1){g=f[l];i=false;for(var n=0,o=e.length;n<o;n+=1){i=e[n].test(g.className);if(!i){break}}if(i){h.push(g)}}return h}}return getElementsByClassName(a,b,c)},
			dropdowns = getElementsByClassName( 'dropdown-menu' );
		for ( i=0; i<dropdowns.length; i++ )
			dropdowns[i].onchange = function(){ if ( this.value != '' ) window.location.href = this.value; }
	</script>

@endsection