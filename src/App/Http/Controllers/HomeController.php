<?php
namespace App\Http\Controllers;

use Fyuze\Http\Response;
use Fyuze\Kernel\Registry;

class HomeController
{
    /**
     * Basic GET route action
     *
     * @return Response
     */
    public function indexAction()
    {
        return new Response('Welcome to Fyuze!');
    }

    /**
     * Basic greeting example with parameters
     *
     * @param $name
     * @return Response
     */
    public function helloAction($name)
    {
        return new Response(sprintf('Hello, %s!', $name));
    }

    /**
     * Temporary method for db interaction
     */
    public function databaseAction()
    {
        /** @var \Fyuze\Database\Db $db */
        $db = Registry::init()->make('Fyuze\Database\Db');

        $db->query('CREATE TABLE users(name varchar(255));');
        $db->query('INSERT INTO users VALUES (?)', ['matthew']);

        $results = $db->query("SELECT * FROM users WHERE name = ?", ['matthew'])->first();

        return new Response(json_encode($results));
    }
}
