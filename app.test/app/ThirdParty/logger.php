<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
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

// create a log channel
$log = new Logger('App');
$log->pushHandler(new StreamHandler(LOG_PATH . '/app.log', Logger::DEBUG));

// add records to the log
$log->info('My logger is now ready');
