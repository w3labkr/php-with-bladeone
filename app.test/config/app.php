<?php 

return [
    'name' => env('APP_NAME', 'App'),
    'env' => env('APP_ENV', 'production'),
    'path' => env('APP_PATH', APP_PATH),
    'debug' => (bool) env('APP_DEBUG', false),
    'url' => env('APP_URL', 'http://localhost'),
    'asset_url' => env('ASSET_URL', null),
    'timezone' => 'Asia/Seoul',
    'locale' => 'ko',    
];