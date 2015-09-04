<?php
return [
    'debug' => true,
    'name' => 'fyuze',
    'timezone' => 'UTC',
    'charset' => 'utf-8',
    'services' => [
        'Fyuze\Kernel\Services\Database'
    ],
    'modules' => [

    ],
    'error_handler' => [
        'log_errors' => true,
        'log_prefix' => 'fyuze',
        'log_frequency' => 'daily'
    ]
];
