<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" prefix="og: http://ogp.me/ns#">

<head>
    @include('includes.head')
</head>

<body>
    <a class="skip-link sr-only sr-only-focusable" href="#primary">Skip Content</a>

    <div id="page" class="site">
        <header id="masthead" class="site-header">
            <div class="container">
                @include('includes.site-branding')
                @include('includes.navigation')
            </div>
        </header>

        <div id="content" class="site-content">
            @include('includes.hero')
            @include('includes.breadcrumb')

            <div id="main-content" class="main-area">
                <div class="container-fluid">

                    <aside id="secondary" class="widget-area sidebar secondary-sidebar">
                        @include('includes.sidebar-secondary')
                    </aside>

                    <main id="primary" class="site-main">
                        @yield('primary')
                    </main><!-- #primary -->

                </div><!-- .container -->
            </div><!-- #main-content -->
        </div><!-- #content -->

        <footer id="colophon" class="site-footer">
            <div class="container">
                @include('includes.copyright')
            </div>
        </footer>
    </div><!-- #page -->

    <!-- Scripts -->
    <script src="/assets/js/common.js"></script>
    @stack('scripts')
</body>

</html>

