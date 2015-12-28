<?php
namespace App\Http\Controllers;

use Fyuze\Database\Db;
use Fyuze\Http\Message\Stream;
use Fyuze\Http\Response;

class HomeController
{
    /**
     * Basic GET route action
     *
     * @return Response
     */
    public function indexAction()
    {
        return '<body>Welcome to Fyuze!</body>';
    }

    /**
     * Basic greeting example with parameters
     *
     * @param $name
     * @return Response
     */
    public function helloAction($name)
    {
        return Response::create(sprintf('<body>Hello, %s!</body>', $name));
    }

    /**
     * Temporary method for db interaction
     *
     * @param Db $db
     * @return Response
     */
    public function databaseAction(Db $db)
    {
        $db->query('CREATE TABLE users(name varchar(255));');
        $db->query('INSERT INTO users VALUES (?)', ['matthew']);

        $results = $db->first("SELECT * FROM users WHERE name = ?", ['matthew']);

        /** Psr7 example */

        $stream = new Stream('php://memory', 'wb+');
        $stream->write(json_encode($results));

        return (new Response)
                ->withStatus(200)
                ->withBody($stream)
                ->withHeader('Content-Type', 'application/json');

    }
}
