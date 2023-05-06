<?php

use Bramus\Router\Router;

return function (Router $router) {
    // Define routes
    $router->set404(function () {
        header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
        echo '404 Not Found';
    });

    $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__));
    $excludes = ['_', '.'];

    // Define routes
    foreach ($rii as $file) {
        $pathName = $file->getPathname();
        $fileName = $file->getFileName();

        if ($file->isDir() || $fileName === basename(__FILE__)) {
            continue;
        }

        foreach ($excludes as $exclude) {
            if (str_starts_with($fileName, $exclude)) {
                continue 2;
            }
        }

        (require_once $pathName)($router);
    }

    $router->get('/', '\App\Controllers\Home@get');
};
