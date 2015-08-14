<?php
// app/routing.php

$router->get('', 'index', 'App\Http\Controllers\HomeController@indexAction');
$router->get('/hello/{name}', 'hello', 'App\Http\Controllers\HomeController@helloAction');
