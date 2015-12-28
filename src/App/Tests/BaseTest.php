<?php
namespace App\Tests;

use Fyuze\Http\Request;
use Fyuze\Kernel\Application\Web;
use Fyuze\Kernel\Registry;

class BaseTest extends \PHPUnit_Framework_TestCase
{
    public function testAppWorks()
    {
        // Will eventually be
        // $request = $this->createRequest('/');
        // $this->assertResponse(200);
        //
        $path = realpath(__DIR__ . '/../../../');
        $app = new Web($path);
        $response = $app->boot();

        $app->getContainer()->dump();

        $this->assertInstanceOf('Fyuze\Http\Response', $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('<body>Welcome to Fyuze!</body>', (string) $response->getBody());
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
        $this->assertEquals('<body>Hello, Matthew!</body>', (string) $response->getBody());
    }

    public function testAppResolvesDatabaseService()
    {
        $path = realpath(__DIR__ . '/../../../');
        $app = new Web($path);
        $_SERVER['REQUEST_URI'] = '/database';
        $response = $app->boot();
        unset($_SERVER['REQUEST_URI']);

        $this->assertInstanceOf('Fyuze\Http\Response', $response);
        //$this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('{"name":"matthew"}', (string) $response->getBody());
    }
}
