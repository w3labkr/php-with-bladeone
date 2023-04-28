<?php

// Set the error reporting level.
// Prior to PHP 8.0.0, the default value was: E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED.
error_reporting(E_ALL);

// This determines whether errors should be printed to the screen as part of the output or if they should be hidden from the user.
ini_set('display_errors', 1);

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
