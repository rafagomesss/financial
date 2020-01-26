<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'bootstrap.php';

use System\Request;
use System\Router;

(new Router())->run();