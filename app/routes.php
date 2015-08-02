<?php
// app/routing.php
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();
$collection->add('index', new Route('/', array(
    '_controller' => 'App\Http\Controllers\HomeController::indexAction'
)));

return $collection;
