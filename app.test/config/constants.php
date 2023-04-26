<?php

define('APP_BASE_PATH', dirname(__DIR__));

// APP_BASE_PATH
define('APP_PATH', APP_BASE_PATH . '/app');
define('CONFIG_PATH', APP_BASE_PATH . '/config');
define('DATA_PATH', APP_BASE_PATH . '/data');
define('DATABASE_PATH', APP_BASE_PATH . '/database');
define('PUBLIC_PATH', APP_BASE_PATH . '/public');
define('RESOURCE_PATH', APP_BASE_PATH . '/resources');
define('ROUTE_PATH', APP_BASE_PATH . '/routes');
define('SCHEDULER_PATH', APP_BASE_PATH . '/schedulers');
define('STORAGE_PATH', APP_BASE_PATH . '/storage');
define('TEST_PATH', APP_BASE_PATH . '/tests');
define('VENDOR_PATH', APP_BASE_PATH . '/vendor');

// RESOURCE_PATH
define('LANGUAGE_PATH', RESOURCE_PATH . '/language');
define('VIEW_PATH', RESOURCE_PATH . '/views');

// STORAGE_PATH
define('CACHE_PATH', STORAGE_PATH . '/cache');
define('LOG_PATH', STORAGE_PATH . '/logs');