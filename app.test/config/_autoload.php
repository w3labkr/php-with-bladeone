<?php

spl_autoload_register(function($class) {
    $namespace = 'App\\';

    if (strpos($class, $namespace) !== 0) {
        return false;
    }
    
    $className = substr($class, strlen($namespace));
    $classPath = str_replace('\\', '/', $className) . '.php';
    $filePath = dirname(__DIR__) .'/'. $classPath;

    if (file_exists($filePath)) {
        include $filePath;
        return true;
    }

    return false;
});