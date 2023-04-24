<?php

// Set Environment
$env = parse_ini_file('.env');

foreach ($env as $key => $value) {
    putenv("{$key}={$value}");
}

// Debugging
error_reporting(-1);
ini_set('display_errors', '1');
