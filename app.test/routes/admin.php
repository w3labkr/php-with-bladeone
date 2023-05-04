<?php

use Bramus\Router\Router;

return function (Router $router) {
    // Define middlewares
    $router->before('GET|POST', '/admin(/.*)?', '\App\Middlewares\Auth@isLogin');
    $router->before('GET|POST', '/admin(/.*)?', '\App\Middlewares\Auth@isAdmin');

    // Define routes
    $router->mount('/admin', function () use ($router) {
        $router->get('/', '\App\Controllers\Admin\Index@get');
        $router->get('/dashboard', '\App\Controllers\Admin\Dashboard@get');
    });
};
