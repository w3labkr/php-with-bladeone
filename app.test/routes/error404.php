<?php

use Bramus\Router\Router;

return function (Router $router) {
    // Define routes
    $router->set404(function () {
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
        echo '404 Not Found';
    });
};
