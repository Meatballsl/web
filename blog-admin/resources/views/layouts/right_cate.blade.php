<div class="widget-last widget widget_categories clearfix">
    <h4>栏目分类</h4>
    <ul>
        @foreach($cate as $key=>$val)
        <li><a href="{{url('/cate/'.$val['id'])}}" title="View all posts filed under Art">{{$val['name']}}</a></li>
    @endforeach
    </ul>
</div>