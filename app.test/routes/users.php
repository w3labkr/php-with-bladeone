<?php

use Bramus\Router\Router;

return function (Router $router) {
    // Define middlewares
    $router->before('GET|POST', '/users(/.*)?', '\App\Middlewares\Auth@isLogin');

    // Define routes
    $router->mount('/users', function () use ($router) {
        $router->get('/{uuid}/profile', '\App\Controllers\Users\Profile@get');
        $router->post('/{uuid}/profile', '\App\Controllers\Users\Profile@post');
    });
};
