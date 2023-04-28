<!DOCTYPE html>
<html lang="ko" prefix="og: http://ogp.me/ns#">

<head>
    @include('includes.head')
</head>

<body>
    <!-- <a class="skip-link sr-only sr-only-focusable" href="#primary">Skip Content</a> -->

    <div id="page" class="site">
        <header id="masthead" class="site-header">
            @include('includes.header')
        </header>

        <div id="content" class="site-content">

            <div id="main-content" class="main-area">
                <div class="container-fluid">

                    <main id="primary" class="site-main">
                        @yield('primary')
                    </main><!-- #primary -->

                </div><!-- .container -->
            </div><!-- #main-content -->

        </div><!-- #content -->

        <footer id="colophon" class="site-footer">
            @include('includes.footer')
        </footer>

    </div><!-- #page -->

    <!-- Scripts -->
    <script src="/assets/js/common.js"></script>
    @stack('scripts')
</body>

</html>
