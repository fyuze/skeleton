<?php

use Fyuze\Kernel\Application\Web;

include __DIR__ . '/../app/bootstrap.php';

(new Web(BASE_PATH))->boot()->send();
