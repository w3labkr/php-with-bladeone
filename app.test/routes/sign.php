<?php

use Bramus\Router\Router;

return function (Router $router) {
    // Define middlewares
    // ...

    // Define routes
    $router->mount("/sign", function () use ($router) {
        // Define middlewares
        $router->before('GET|POST', '/(signout|welcome|farewell)', '\App\Middlewares\Auth@isSignIn');
        
        // Define routes
        $router->get('/', '\App\Controllers\Sign@index');
        $router->get('/signin', '\App\Controllers\Sign@signin');
        $router->post('/signin', '\App\Controllers\Sign@postSignin');

        $router->get('/signout', '\App\Controllers\Sign@signout');
        
        $router->get('/signup', '\App\Controllers\Sign@signup');
        $router->post('/signup', '\App\Controllers\Sign@postSignup');

        $router->get('/welcome', '\App\Controllers\Sign@welcome');

        $router->get('/farewell', '\App\Controllers\Sign@farewell');
    });
};
