<?php
return [
    'debug' => true,
    'name' => 'fyuze',
    'timezone' => 'UTC',
    'charset' => 'utf-8',
    'services' => [
        'Fyuze\Kernel\Services\Database',
        'Fyuze\Kernel\Services\Debug',
        'Fyuze\Kernel\Services\Event',
        'Fyuze\Kernel\Services\Logger'
    ],
    'modules' => [

    ],
    'error_handler' => [
        'log_errors' => true,
        'log_prefix' => 'fyuze',
        'log_frequency' => 'daily'
    ]
];
