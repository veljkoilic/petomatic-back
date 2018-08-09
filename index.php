<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers:*');
require "vendor/autoload.php";
$query = require "core/bootstrap.php";

use \App\Core\Request;

\App\Core\Router::load("routes.php")->direct(Request::prepare(), Request::method());





