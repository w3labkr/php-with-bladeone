<?php

// use Illuminate\Contracts\Http\Kernel;
// use Illuminate\Http\Request;

define('APP_START', microtime(true));

// Require composer autoloader
require __DIR__ . '/../vendor/autoload.php';

// Load helpers
require_once __DIR__ . '/../app/helpers.php';

// Create Router instance
$router = new \Bramus\Router\Router();

// Define routes
(require_once __DIR__ . '/../routes/web.php')($router);

// Run it!
$router->run();
