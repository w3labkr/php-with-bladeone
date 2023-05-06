@if($hero)
<div id="hero" class="site-hero">
    <div class="container">
        @section('hero')
        <h1>PHP Ninja</h1>
        <p>This is a starter project using the php mvp pattern without a framework.</p>
        @endsection
        @yield('hero')
    </div>
</div>
@endif
