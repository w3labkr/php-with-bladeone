<?php

require_once __DIR__ . '/config/constants.php';

// Loads environment variables from `.env` to `getenv()`, `$_ENV` and `$_SERVER` automagically.
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);

// To suppress the exception that is thrown when there is no .env file
$dotenv->safeLoad();

// Set the error reporting level.
// Prior to PHP 8.0.0, the default value was: E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED.
error_reporting(E_ALL);

// This determines whether errors should be printed to the screen as part of the output or if they should be hidden from the user.
if (config('app.debug')) {
    ini_set('display_errors', 1);
} else {
    ini_set('display_errors', 0);
}

// Sends your logs to files, sockets, inboxes, databases and various web services
// require_once __DIR__ . '/app/ThirdParty/logger.php';
