<?php
use Fyuze\Kernel\Application\Web;

define('APP_START', microtime(true));
define('BASE_PATH', __DIR__ . '/../');
define('APP_PATH', BASE_PATH . '/app');

require BASE_PATH . '/vendor/autoload.php';

$app = new Web(BASE_PATH);
$response = $app->boot();

include __DIR__ . '/../app/bootstrap.php';

$response->send();
