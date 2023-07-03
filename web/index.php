<?php
require_once('lib/Route.php');
require_once('config/route.php');
use Liqsyst\Lib\Route\RouteClass as Route;

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/session.php');

$route = new Route($routeMap);
$route->run();
require_once('config/db.php');