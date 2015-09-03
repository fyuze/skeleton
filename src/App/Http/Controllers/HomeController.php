<?php
namespace App\Http\Controllers;

use Fyuze\Database\Db;
use Fyuze\Http\Response;
use Fyuze\Kernel\Registry;

class HomeController
{
    /**
     * @var Registry
     */
    protected $registry;

    /**
     * HomeController constructor.
     *
     * @param Registry $registry
     */
    public function __construct(Registry $registry)
    {
        $this->registry = $registry;
    }

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
     *
     * @param Db $db
     * @return Response
     */
    public function databaseAction(Db $db)
    {
        $db->query('CREATE TABLE users(name varchar(255));');
        $db->query('INSERT INTO users VALUES (?)', ['matthew']);

        $results = $db->first("SELECT * FROM users WHERE name = ?", ['matthew']);

        return new Response(json_encode($results));
    }
}
