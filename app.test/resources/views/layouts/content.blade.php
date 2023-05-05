<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" prefix="og: http://ogp.me/ns#">

<head>
    @include('includes.head')
</head>

<body>
    <!-- <a class="skip-link sr-only sr-only-focusable" href="#primary">Skip Content</a> -->
    <div id="page" class="site">

        @if($header)
        <header id="masthead" class="site-header">
            @include('includes.header')
        </header>
        @endif

        <div id="content" class="site-content">

            @if($hero)
            <div id="hero" class="site-hero">
                @include('includes.hero')
            </div>
            @endif

            @if($breadcrumb)
            <div id="breadcrumb" class="site-breadcrumb">
                @include('includes.breadcrumb')
            </div>
            @endif

            <div id="main-content" class="main-area">
                <div class="container-fluid">

                    <main id="primary" class="site-main">
                        @yield('primary')
                    </main><!-- #primary -->

                </div><!-- .container -->
            </div><!-- #main-content -->

        </div><!-- #content -->

        @if($footer)
        <footer id="colophon" class="site-footer">
            @include('includes.footer')
        </footer>
        @endif

    </div><!-- #page -->

    <!-- Scripts -->
    <script src="/assets/js/common.js"></script>
    @stack('scripts')
</body>

</html>
