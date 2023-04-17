<?php

require_once('lib/Route.php');
require_once('config/route.php');

use Liqsyst\Utility\RouteClass as Route;

// $path_info = (isset($_SERVER["PATH_INFO"]) && !is_null($_SERVER["PATH_INFO"])) ? $_SERVER["PATH_INFO"] : '/';
$route = new Route($routMap);
$route->run();
// require_once('controllers/' . $routeMap['info']['controller'] . '.' . 'php');

// echo $route_str;

// echo '<pre>';
// print_r($_SERVER);
// echo '</pre>';