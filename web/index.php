<?php

require_once('lib/Route.php');
require_once('config/route.php');
use Liqsyst\Utility\RouteClass as Route;

$route = new Route($routMap);
$route->run();