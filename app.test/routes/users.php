<?php

use Bramus\Router\Router;

return function (Router $router) {
    // Define middlewares
    $router->before('GET|POST', '/users/{username}(/.*)?', '\App\Middlewares\Users@auth');

    // Define routes
    $router->mount('/users/{username}', function () use ($router) {
        $controller = '\App\Controllers\Users';

        $router->get('/profile', $controller.'\Profile@get');
        $router->post('/profile', $controller.'\Profile@post');

        $router->get('/account', $controller.'\Account@get');
        $router->post('/account', $controller.'\Account@post');

        $router->post('/withdrawal', $controller.'\Withdrawal@post');

        $router->get('/security', $controller.'\Security@get');
        $router->post('/security', $controller.'\Security@post');

        $router->get('/', $controller.'\Overview@get');
    });
};
