<?php

require_once('lib/Utility.php');

use Liqsyst\Utility\UtilityClass as Utility;

$utility = new Utility($_SERVER["PATH_INFO"]);
$utility->routingUrl();