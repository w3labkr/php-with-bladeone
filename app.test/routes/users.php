<?php

use Bramus\Router\Router;

return function (Router $router) {
    // Define middlewares
    $router->before('GET|POST', '/users/{username}(/.*)?', '\App\Middlewares\Users@auth');

    // Define routes
    $router->mount('/users/{username}', function () use ($router) {
        $router->get('/profile', '\App\Controllers\Users\Profile@get');
        $router->post('/profile', '\App\Controllers\Users\Profile@post');

        $router->get('/account', '\App\Controllers\Users\Account@get');
        $router->post('/account', '\App\Controllers\Users\Account@post');

        $router->post('/withdrawal', '\App\Controllers\Users\Withdrawal@post');

        $router->get('/security', '\App\Controllers\Users\Security@get');
        $router->post('/security', '\App\Controllers\Users\Security@post');

        $router->get('/', '\App\Controllers\Users\Overview@get');
    });
};
