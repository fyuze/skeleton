<?php
namespace App\Tests;

use Fyuze\Http\Request;
use Fyuze\Kernel\Application\Web;
use Fyuze\Kernel\Registry;

class BaseTest extends \PHPUnit_Framework_TestCase
{
    public function testAppWorks()
    {
        $path = realpath(__DIR__ . '/../../../');
        $app = new Web($path);
        $response = $app->boot();

        $app->getContainer()->dump();

        $this->assertInstanceOf('Fyuze\Http\Response', $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('Welcome to Fyuze!', $response->getBody());

    }

    public function testAppLoadsSecondaryRoute()
    {
        $path = realpath(__DIR__ . '/../../../');
        $app = new Web($path);
        $_SERVER['REQUEST_URI'] = '/hello/Matthew';
        $response = $app->boot();
        unset($_SERVER['REQUEST_URI']);

        $app->getContainer()->dump();

        $this->assertInstanceOf('Fyuze\Http\Response', $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('Hello, Matthew!', $response->getBody());
    }

    public function testAppResolvesDatabaseService()
    {
        $path = realpath(__DIR__ . '/../../../');
        $app = new Web($path);
        $_SERVER['REQUEST_URI'] = '/database';
        $response = $app->boot();
        unset($_SERVER['REQUEST_URI']);

        $this->assertInstanceOf('Fyuze\Http\Response', $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('{"name":"matthew"}', $response->getBody());
    }
}
