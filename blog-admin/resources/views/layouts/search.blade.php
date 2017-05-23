<div class="widget-first widget widget_search clearfix">
    <form role="search" method="get" action="{{url('search')}}">
        <input type="text" value="Search..." name="search"
               onblur="if (this.value == '')  {this.value = 'Search...';}" onfocus="if (this.value == 'Search...')
{this.value = '';}"/>
    </form>
</div>