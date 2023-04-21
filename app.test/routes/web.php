<?php

use Bramus\Router\Router;

return function (Router $router) {
    // Define middlewares
    $router->before('GET', '/.*', function () {
        // ... this will always be executed
    });
    
    // Define routes
    $router->set404(function () {
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
        echo '404, route not found!';
    });

    $router->get('/', function () {
        echo 'Home Page';
    });

    $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__));

    foreach ($rii as $file) {
        $pathName = $file->getPathname();
        $fileName = $file->getFileName();

        if ($file->isDir()) {
            continue;
        }

        if ($fileName === basename(__FILE__) || strpos($fileName, '_') === 0) {
            continue;
        }

        (require_once $pathName)($router);
    }
};
