<?php

// Constants of Application
require_once __DIR__ . '/config/constants.php';

// Require Composer Autoloader
require __DIR__ . '/vendor/autoload.php';

// Set the current session save path
session_save_path(SESSION_PATH);

// The probability that the gc (garbage collection) process is started on every session initialization.
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 100);

// Specifies the number of seconds after which data will be seen as 'garbage' and potentially cleaned up.
ini_set('session.gc_maxlifetime', config('session.lifetime'));

// Creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie.
session_start();

// Loads environment variables from `.env` to `getenv()`, `$_ENV` and `$_SERVER` automagically.
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);

// To suppress the exception that is thrown when there is no .env file
$dotenv->safeLoad();

// This determines whether errors should be printed to the screen as part of the output or if they should be hidden from the user.
if (!config('app.debug')) {
    ini_set('display_errors', 0);
}

// Sends your logs to files, sockets, inboxes, databases and various web services
// require_once __DIR__ . '/app/ThirdParty/logger.php';

// Generates fake data
// $faker = new \App\Models\UserFaker();
// $faker->createTable()->factory(10);
// $faker->test();
