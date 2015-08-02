<?php
namespace App\Http\Controllers;

use Fyuze\Http\Response;

class HomeController
{
    public function indexAction()
    {
        return new Response('Welcome to Fyuze!');
    }
}
