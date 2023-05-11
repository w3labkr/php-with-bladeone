<?php

use Bramus\Router\Router;

return function (Router $router) {
    // Define routes
    $router->get('/login', '\App\Controllers\Auth\Login@get');
    $router->post('/login', '\App\Controllers\Auth\Login@post');

    $router->get('/logout', '\App\Controllers\Auth\Logout@get');

    $router->get('/register', '\App\Controllers\Auth\Register@get');
    $router->post('/register', '\App\Controllers\Auth\Register@post');

    $router->get('/forgot-username', '\App\Controllers\Auth\ForgotUsername@get');
    $router->post('/forgot-username', '\App\Controllers\Auth\ForgotUsername@post');

    $router->get('/forgot-password', '\App\Controllers\Auth\ForgotPassword@get');
    $router->post('/forgot-password', '\App\Controllers\Auth\ForgotPassword@post');

    // Define routes
    // $router->before('GET|POST', '/reset-password', '\App\Middlewares\Auth@isResetPassword');
    $router->get('/reset-password', '\App\Controllers\Auth\ResetPassword@get');
    $router->post('/reset-password', '\App\Controllers\Auth\ResetPassword@post');

    // Define routes
    $router->before('GET', '/welcome', '\App\Middlewares\Auth@isWelcome');
    $router->get('/welcome', '\App\Controllers\Auth\Welcome@get');

    // Define routes
    $router->get('/farewell', '\App\Controllers\Auth\Farewell@get');
};
