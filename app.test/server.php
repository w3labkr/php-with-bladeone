<?php

// Constants of Application
require_once __DIR__.'/config/constants.php';

// Require Composer Autoloader
require __DIR__.'/vendor/autoload.php';

// Set the current session save path
session_save_path(config('session.files'));

// Get and/or set current cache expire
session_cache_expire(config('session.expire'));

// The probability that the gc (garbage collection) process is started on every session initialization.
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 100);

// Specifies the number of seconds after which data will be seen as 'garbage' and potentially cleaned up.
ini_set('session.gc_maxlifetime', config('session.lifetime'));

// Start new or resume existing session
session_start();
session_write_close();

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
