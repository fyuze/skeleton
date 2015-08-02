<?php

use Fyuze\Kernel\Application\Web;

include __DIR__ . '/../app/bootstrap.php';

(new Web(APP_PATH))->boot()->send();
