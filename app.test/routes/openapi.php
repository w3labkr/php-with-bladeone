<?php

use Bramus\Router\Router;

return function (Router $router) {
    // Define middlewares
    // ...

    // Define routes
    $router->mount('/openapi', function () use ($router) {
        $router->before('GET|POST', '/(?!v1).*', function () {
            if (!isset($_SESSION['user'])) {
                header('location: /openapi/v1');
                exit;
            }
        });

        $router->get('/', '\App\Controllers\OpenAPI\Index@get');
        $router->get('/v1', '\App\Controllers\OpenAPI\V1\Index@get');
    });
};
