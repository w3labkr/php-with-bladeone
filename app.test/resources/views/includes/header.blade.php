<div class="container">
    @if($branding)
        @include('includes.site-branding')
    @endif

    @if($navigation)
        @if(session()->get('auth.loggedin'))
            @include('includes.navigation-loggedin')
        @else
            @include('includes.navigation')
        @endif
    @endif
</div>
