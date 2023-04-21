<?php

use Bramus\Router\Router;

return function (Router $router) {
    // Define middlewares
    $router->before('GET|POST', '/api(/.*)?', '\App\Middlewares\Auth@isSignIn');

    // Define routes
    $router->mount("/api", function () use ($router) {
        $router->before('GET|POST', '/(?!v1).*', function () {
            if (!isset($_SESSION['user'])) {
                header('location: /api/v1');
                exit();
            }
        });
    
        $router->get('/', '\App\Controllers\Api@index');
        $router->get('/v1', '\App\Controllers\Api@v1');
    });
};
