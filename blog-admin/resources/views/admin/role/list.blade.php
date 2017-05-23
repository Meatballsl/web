@extends('layouts.admin')
@section('content')
    <form action="{{url('admin/list')}}" method="post">
        <!--结果集标题与导航组件 结束-->
        {{csrf_field()}}
        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">

                    {{--@foreach($role as $value)--}}
                        {{--<tr> <th><input type="checkbox" name="role_id" value="{{$value->id}}"></th><th>{{$value->display_name}}</th></tr>--}}
                        {{--@endforeach--}}
                    <tr>
                        <th>选择</th>
                        <th class="tc">ID</th>
                        <th>名称</th>
                        <th>别称</th>
                        <th>描述</th>
                        <th>创建时间</th>

                    </tr>

                    @foreach($role as $value)
                        <tr>

                            <th><input type="checkbox" name="role_id[]" value="{{$value->id}}"></th>
                            <th class="tc">{{$value->id}}</th>
                            <th>{{$value->name}}</th>
                            <th>{{$value->display_name}}</th>
                            <th>{{$value->description}}</th>
                            <th>{{$value->created_at}}</th>



                        </tr>
                    @endforeach

                    <tr>

                        <td>
                            <input type="submit" value="提交">

                        </td>
                    </tr>
                </table>


            </div>
        </div>
    </form>
     <input type="hidden" id="roleIds" value="{{session('roleIds')}}">
    <!--搜索结果页面 列表 结束-->
    <script>
        var index = parent.layer.getFrameIndex(window.name);

        var roleIds = document.getElementById("roleIds").value;

         if(roleIds){
             parent.$("#roleIds").val(roleIds);
             parent.layer.close(index);
         }

    </script>
@endsection


