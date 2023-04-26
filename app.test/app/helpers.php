<?php

if (!function_exists('env')) {
    function env(string $key, $default = null)
    {
        $value = $_ENV[$key] ?? '';

        if ($value == false) {
            return $default;
        }

        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;

            case 'false':
            case '(false)':
                return false;

            case 'empty':
            case '(empty)':
                return '';

            case 'null':
            case '(null)':
                return;
        }
        
        if (str_starts_with($value, '"') && str_ends_with($value, '"')) {
            return substr($value, 1, -1);
        }

        return $value;
    }
}

if (!function_exists('config')) {
    function config(string $string)
    {
        $lst = explode('.', $string);

        $fileName = $lst[0];
        $filePath = CONFIG_PATH . "/{$fileName}.php";

        if (!file_exists($filePath)) {
            return NULL;
        }

        array_shift($lst);

        $deepArray = include $filePath;
        $getArrayPath = function (array $array, array $initial) {
            $callback = function (array $xs, $x) {
                return (array_key_exists($x, $xs)) ? $xs[$x] : NULL;
            };
            return array_reduce($array, $callback, $initial);
        };

        return $getArrayPath($lst, $deepArray);
    }
}

if (!function_exists('view')) {
    function view(string $template, array $data = [])
    {
        $blade = new \eftec\bladeone\BladeOne(VIEW_PATH, CACHE_PATH, \eftec\bladeone\BladeOne::MODE_DEBUG);
        return $blade->run($template, $data);
    }
}
