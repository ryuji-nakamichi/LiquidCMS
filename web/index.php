<?php

require_once('lib/Utility.php');

use Liqsyst\Utility\UtilityClass as Utility;
// echo '<pre>';
// print_r($_SERVER);
// echo '</pre>';
$path_info = (isset($_SERVER["PATH_INFO"]) && !is_null($_SERVER["PATH_INFO"])) ? $_SERVER["PATH_INFO"] : '/';
$utility = new Utility($path_info);
$utility->routingUrl();