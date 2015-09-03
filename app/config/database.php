<?php
return [
    'fetch' => 'PDO:::FETCH_OBJ',
    'default' => 'sqlite',
    'connections' => [
        'sqlite' => [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => null,
        ]
    ]
];
