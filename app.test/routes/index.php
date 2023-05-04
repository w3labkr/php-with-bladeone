<?php

use Bramus\Router\Router;

return function (Router $router) {
    // Define middlewares
    $router->before('GET', '/.*', function () {
        // ... this will always be executed
    });

    // Define routes
    $router->set404(function () {
        header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
        echo '404 Not Found';
    });
    $router->get('/', '\App\Controllers\Index@get');
};
