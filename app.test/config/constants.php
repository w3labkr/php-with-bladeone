<?php

define('APP_BASE_PATH', dirname(__DIR__));

// APP_BASE_PATH
define('APP_PATH', APP_BASE_PATH.'/app');
define('CONFIG_PATH', APP_BASE_PATH.'/config');
define('DATA_PATH', APP_BASE_PATH.'/data');
define('DATABASE_PATH', APP_BASE_PATH.'/database');
define('PUBLIC_PATH', APP_BASE_PATH.'/public');
define('RESOURCE_PATH', APP_BASE_PATH.'/resources');
define('ROUTE_PATH', APP_BASE_PATH.'/routes');
define('SCHEDULER_PATH', APP_BASE_PATH.'/schedulers');
define('STORAGE_PATH', APP_BASE_PATH.'/storage');
define('TEST_PATH', APP_BASE_PATH.'/tests');
define('VENDOR_PATH', APP_BASE_PATH.'/vendor');

// DATA_PATH
define('SQL_PATH', DATA_PATH.'/sql');

// RESOURCE_PATH
define('LANGUAGE_PATH', RESOURCE_PATH.'/language');
define('VIEW_PATH', RESOURCE_PATH.'/views');

// STORAGE_PATH
define('LOG_PATH', STORAGE_PATH.'/logs');
define('FRAMEWORK_PATH', STORAGE_PATH.'/framework');

// FRAMEWORK_PATH
define('CACHE_PATH', FRAMEWORK_PATH.'/cache');
define('SESSION_PATH', FRAMEWORK_PATH.'/sessions');
define('TESTING_PATH', FRAMEWORK_PATH.'/testing');
define('VIEW_CACHE_PATH', FRAMEWORK_PATH.'/views');
