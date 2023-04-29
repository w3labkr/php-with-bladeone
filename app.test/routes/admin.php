<?php

use Bramus\Router\Router;

return function (Router $router) {
    // Define middlewares
    $router->before('GET|POST', '/admin(/.*)?', '\App\Middlewares\Auth@isSignIn');
    $router->before('GET|POST', '/admin(/.*)?', '\App\Middlewares\Auth@isAdmin');

    // Define routes
    $router->mount('/admin', function () use ($router) {
        $router->get('/', '\App\Controllers\Admin@index');
        $router->get('/dashboard', '\App\Controllers\Admin@dashboard');
    });
};
