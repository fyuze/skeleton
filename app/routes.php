<?php
// app/routing.php

use Fyuze\Http\Response;

$router->get('', 'index', function() {
   return new Response('Welcome to Fyuze!');
});
