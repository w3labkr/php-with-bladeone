    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--
        By default, Safari on iOS detects any string formatted like a phone number and makes it a link that calls the number.
        Specifying telephone=no disables this feature.
        
        https://developer.apple.com/library/archive/documentation/AppleApplications/Reference/SafariHTMLRef/Articles/MetaTags.html
    -->
    <meta name="format-detection" content="telephone=no" />

    <!--
        The Cache-Control HTTP header holds directives (instructions) for caching in both requests and responses.
        A given directive in a request does not mean the same directive should be in the response.

        https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Cache-Control
        
        <meta http-equiv="Cache-Control" content="no-cache, no-store, max-age=0" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
    -->

    <!--
        A favicon (favorite icon) is a tiny icon included along with a website,
        which is displayed in places like the browser's address bar, page tabs and bookmarks menu.

        https://developer.mozilla.org/en-US/docs/Glossary/Favicon
    -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png" />
    <link rel="manifest" href="/site.webmanifest" />

    <!-- Search Engine Optimization -->
    <title>@yield('title', 'title') | <?= config('app.name'); ?></title>
    <meta name="description" content="@yield('description', 'description')" />
    <meta name="keywords" content="@yield('keywords', 'keywords')" />

    @stack('metas')

    <!-- Stylesheets -->
    <link rel="stylesheet" href="/assets/css/common.css" />
    @stack('styles')
