

<aside class="list conferences aside section">
    <div class="section-inner">
        <h2 class="heading">朋友圈</h2>
        <div class="content">
            <ul class="list-unstyled">
                <li><i class="fa fa-calendar"></i> <a href="{{ route('users.followings', $user->id) }}" >关注</a> ({{ count($user->followings) }})</li>
                <li><i class="fa fa-calendar"></i> <a href="{{ route('users.followers', $user->id) }}">粉丝</a> ({{ count($user->followers) }})</li>
            </ul>
        </div><!--//content-->
    </div><!--//section-inner-->
</aside><!--//section-->