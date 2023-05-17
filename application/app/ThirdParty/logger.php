<?php

/**
 * Monolog - Logging for PHP.
 *
 * Monolog sends your logs to files, sockets, inboxes, databases and various web services.
 *
 * @see https://github.com/Seldaek/monolog
 *
 * @license MIT License
 */

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

// Create a log channel
$log = new Logger('Application');
$log->pushHandler(new StreamHandler(LOG_PATH.'/application.log', Logger::DEBUG));

/*
 * Log Levels
 *
 * DEBUG (100): Detailed debug information.
 * INFO (200): Interesting events.
 * WARNING (300): Exceptional occurrences that are not errors.
 * ERROR (400): Runtime errors that do not require immediate action but should typically be logged and monitored.
 * CRITICAL (500): Critical conditions.
 * ALERT (550): Action must be taken immediately.
 * EMERGENCY (600): Emergency: system is unusable.
 */

// Add records to the log
$log->info('Logger is now ready');
