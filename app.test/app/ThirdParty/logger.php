<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('Application');
$log->pushHandler(new StreamHandler(LOG_PATH . '/app.log', Logger::DEBUG));

// add records to the log
$logger->debug('Welcome To Monolog');
$logger->info('Welcome To Monolog');
$logger->notice('Welcome To Monolog');
$logger->warning('Welcome To Monolog');
$logger->error('Welcome To Monolog');
$logger->alert('Welcome To Monolog');
$logger->emergency("Welcome To Monolog");