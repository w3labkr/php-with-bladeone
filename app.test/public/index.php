<?php

define('APP_START', microtime(true));

// Require composer autoloader
require __DIR__ . '/../vendor/autoload.php';

// bootstrap
require_once __DIR__ . '/../server.php';

// Create Router instance
$router = new \Bramus\Router\Router();

// Define routes
(require_once __DIR__ . '/../routes/web.php')($router);

// Run it!
$router->run();
