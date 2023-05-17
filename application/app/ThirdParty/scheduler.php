<?php

/**
 * PHP Cron Scheduler.
 *
 * This is a framework agnostic cron jobs scheduler that can be easily integrated with your project or run as a standalone command scheduler.
 *
 * @see https://github.com/peppeocchi/php-cron-scheduler
 *
 * @license MIT License
 */

use GO\Scheduler;

// Create a new scheduler
$scheduler = new Scheduler();

// ... configure the scheduled jobs (see below) ...
$scheduler->php(SCHEDULER_PATH.'/job.php')->at('* * * * *');

// Let the scheduler execute jobs which are due.
$scheduler->run();
