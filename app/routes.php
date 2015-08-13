<?php
// app/routing.php

use Fyuze\Http\Response;

$router->get('', 'index', 'App\Http\Controllers\HomeController@indexAction');
