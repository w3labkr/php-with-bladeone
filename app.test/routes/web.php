<?php

use Bramus\Router\Router;

return function (Router $router) {
    $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__));

    $excludes = ['_', '.'];

    // Define routes
    foreach ($rii as $file) {
        $pathName = $file->getPathname();
        $fileName = $file->getFileName();

        if ($file->isDir() || $fileName === basename(__FILE__)) {
            continue;
        }

        foreach ($excludes as $exclude) {
            if (str_starts_with($fileName, $exclude)) {
                continue 2;
            }
        }

        (require_once $pathName)($router);
    }
};
