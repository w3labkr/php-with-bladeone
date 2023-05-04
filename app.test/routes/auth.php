<?php

use Bramus\Router\Router;

return function (Router $router) {
    // Define middlewares
    $router->before('GET|POST', '/(logout|farewell)', '\App\Middlewares\Auth@isLogin');

    // Define routes
    $router->get('/login', '\App\Controllers\Auth\Login@get');
    $router->post('/login', '\App\Controllers\Auth\Login@post');

    $router->get('/logout', '\App\Controllers\Auth\Logout@get');

    $router->get('/register', '\App\Controllers\Auth\Register@get');
    $router->post('/register', '\App\Controllers\Auth\Register@post');

    $router->get('/forgot-password', '\App\Controllers\Auth\ForgotPassword@get');
    $router->post('/forgot-password', '\App\Controllers\Auth\ForgotPassword@post');

    $router->get('/reset-password', '\App\Controllers\Auth\ResetPassword@get');
    $router->post('/reset-password', '\App\Controllers\Auth\ResetPassword@post');
    $router->get('/farewell', '\App\Controllers\Auth\Farewell@get');

    // Define routes
    $router->before('GET', '/welcome', '\App\Middlewares\Auth@isWelcome');
    $router->get('/welcome', '\App\Controllers\Auth\Welcome@get');
};
