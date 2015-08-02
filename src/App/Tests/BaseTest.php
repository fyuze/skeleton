<?php
namespace App\Tests;

use Fyuze\Kernel\Application\Web;

class BaseTest extends \PHPUnit_Framework_TestCase
{
    public function testAppWorks()
    {
        $path = realpath(__DIR__ . '/../../../app');
        $app = new Web($path);
        $response = $app->boot();

        $this->assertInstanceOf('Fyuze\Http\Response', $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('Welcome to Fyuze!', $response->getContent());
    }
}
