<?php

use Bramus\Router\Router;

return function (Router $router) {
    // Define middlewares
    $router->before('GET', '/.*', function () {
        // ... this will always be executed
    });

    // Define routes
    $router->get('/', '\App\Controllers\Hello@index');
};
