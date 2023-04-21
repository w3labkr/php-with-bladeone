<?php

use Bramus\Router\Router;

return function (Router $router) {
    // Define middlewares
    $router->before('GET|POST', '/users(/.*)?', '\App\Middlewares\Auth@isSignIn');
    $router->before('GET|POST', '/users(/.*)?', '\App\Middlewares\Auth@isUser');

    // Define routes
    $router->mount("/users", function () use ($router) {
        $router->get('/', function () {
            echo 'Users Page';
        });
    });
};
