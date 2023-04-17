<?php

require_once('lib/Route.php');
require_once('config/route.php');
use Liqsyst\Lib\Route\RouteClass as Route;

$route = new Route($routMap);
$route->run();