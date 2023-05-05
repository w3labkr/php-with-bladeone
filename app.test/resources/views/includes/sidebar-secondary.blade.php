@php($slug = '/users/' . $user['username'])

<div class="widget">
    <h3 class="widget-title">Widget Title</h3>
    <ul class="widget-list">
        <li><a href="{{ $slug }}">Overview</a></li>
        <li><a href="{{ $slug }}/profile">Profile</a></li>
        <li><a href="{{ $slug }}/account">Account</a></li>
        <li><a href="{{ $slug }}/security">Security</a></li>
    </ul>
</div>
