<?php

// creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie.
session_start();

// Start The Application
require_once __DIR__ . '/../server.php';

// Create Router instance
$router = new \Bramus\Router\Router();

// Define routes
(require_once __DIR__ . '/../routes/web.php')($router);

// Run it!
$router->run();