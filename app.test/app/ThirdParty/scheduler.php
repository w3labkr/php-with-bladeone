<?php

use GO\Scheduler;

// Create a new scheduler
$scheduler = new Scheduler();

// ... configure the scheduled jobs (see below) ...
$scheduler->php(SCHEDULER_PATH . '/job.php')->at('* * * * *');

// Let the scheduler execute jobs which are due.
$scheduler->run();