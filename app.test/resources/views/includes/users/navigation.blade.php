@if($navigation)
<div class="site-navigation">
    <nav class="site-nav">
        <a href="/users/{{ $user['username'] }}">Overview</a>
        <a href="/logout">Logout</a>
    </nav>
</div>
@endif
