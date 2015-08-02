<?php
// app/routing.php
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();
$collection->add('index', new Route('/', [
    '_controller' => 'App\Http\Controllers\HomeController::indexAction'
]));
$collection->add('hello', new Route('/hello/{name}', [
    '_controller' => 'App\Http\Controllers\HomeController::testAction',
]));
return $collection;
