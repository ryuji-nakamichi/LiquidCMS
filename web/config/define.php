<?php

define("LANGAGE", 'ja');
define("APP_NAME", 'LiquidSystem');
define("CHARSET", 'UTF-8');
define("DOMAIN_URI", (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST']);
define("INCLUDE_CONFIG_PATH", $_SERVER['DOCUMENT_ROOT'] . '/config/');
define("INCLUDE_AJAX_PATH", $_SERVER['DOCUMENT_ROOT'] . '/ajax/');
define("INCLUDE_LIB_PATH", $_SERVER['DOCUMENT_ROOT'] . '/lib/');
define("INCLUDE_REQUESTS_PATH", $_SERVER['DOCUMENT_ROOT'] . '/requests/');
define("INCLUDE_BLOCK_PATH", $_SERVER['DOCUMENT_ROOT'] . '/views/inc/');
define("DB_DSH", 'mysql:dbname=liquidsystem;host=mysql');
define("DB_USER", 'root');
define("DB_PASSWORD", 'password');