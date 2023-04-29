<?php

use Bramus\Router\Router;

return function (Router $router) {
    // Define middlewares
    // ...

    // Define routes
    $router->mount('/sign', function () use ($router) {
        // Define middlewares
        $router->before('GET|POST', '/(signout|welcome|farewell)', '\App\Middlewares\Auth@isSignin');

        // Define routes
        $router->get('/', '\App\Controllers\Sign\Index@get');
        $router->get('/signin', '\App\Controllers\Sign\Signin@get');
        $router->post('/signin', '\App\Controllers\Sign\Signin@post');

        $router->get('/signout', '\App\Controllers\Sign\Signout@get');

        $router->get('/signup', '\App\Controllers\Sign\Signup@get');
        $router->post('/signup', '\App\Controllers\Sign\Signup@post');

        $router->get('/forgot-password', '\App\Controllers\Sign\ForgotPassword@get');
        $router->post('/forgot-password', '\App\Controllers\Sign\ForgotPassword@post');
        $router->get('/reset-password', '\App\Controllers\Sign\ResetPassword@get');
        $router->post('/reset-password', '\App\Controllers\Sign\ResetPassword@post');

        $router->get('/welcome', '\App\Controllers\Sign\Welcome@get');
        $router->get('/farewell', '\App\Controllers\Sign\Farewell@get');
    });
};
