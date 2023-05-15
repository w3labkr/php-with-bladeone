<?php

use Bramus\Router\Router;

return function (Router $router) {
    // Define middlewares
    $middleware = '\App\Middlewares\Auth';

    $router->before('GET|POST', '/reset-password', $middleware.'\ResetPassword@auth');
    $router->before('GET', '/welcome', $middleware.'\Welcome@auth');

    // Define routes
    $controller = '\App\Controllers\Auth';

    $router->get('/login', $controller.'\Login@get');
    $router->post('/login', $controller.'\Login@post');

    $router->get('/logout', $controller.'\Logout@get');

    $router->get('/register', $controller.'\Register@get');
    $router->post('/register', $controller.'\Register@post');

    $router->get('/forgot-username', $controller.'\ForgotUsername@get');
    $router->post('/forgot-username', $controller.'\ForgotUsername@post');

    $router->get('/forgot-password', $controller.'\ForgotPassword@get');
    $router->post('/forgot-password', $controller.'\ForgotPassword@post');

    $router->get('/reset-password', $controller.'\ResetPassword@get');
    $router->post('/reset-password', $controller.'\ResetPassword@post');

    $router->get('/welcome', $controller.'\Welcome@get');

    $router->get('/farewell', $controller.'\Farewell@get');
};
