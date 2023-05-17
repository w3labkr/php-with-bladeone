<?php

use Bramus\Router\Router;

return function (Router $router) {
    // Define middlewares
    // ...

    // Define routes
    $router->mount('/api', function () use ($router) {
        $router->before('GET|POST', '/(?!v1).*', function () {
            if (1 !== session()->get('loggedin')) {
                header('location: /api/v1');
                exit;
            }
        });

        $router->get('/', '\App\Controllers\API\Index@get');
        $router->get('/v1', '\App\Controllers\API\V1\Index@get');
    });
};
