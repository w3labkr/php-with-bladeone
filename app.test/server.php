<?php

require_once __DIR__ . '/config/constants.php';

// Loads environment variables from `.env` to `getenv()`, `$_ENV` and `$_SERVER` automagically.
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);

// To suppress the exception that is thrown when there is no .env file
$dotenv->safeLoad();

// This determines whether errors should be printed to the screen as part of the output or if they should be hidden from the user.
if (!config('app.debug')) {
    ini_set('display_errors', 0);
}

// Generates fake data
$faker = new \App\Models\UserFaker();
$faker->createTable()->factory(10);

// Sends your logs to files, sockets, inboxes, databases and various web services
//require_once __DIR__ . '/app/ThirdParty/logger.php';
