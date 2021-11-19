<?php

require_once '../vendor/autoload.php';
require_once '../config/api.php';

use App\Database\Database;
use App\Helpers\Request;
use App\Routers\Route;

$request = new Request(REQUEST_URL, REQUEST_PARAM, REQUEST_HEADERS, $middlewares);
$database = Database::factory(DATABASE_TYPE, DATABASE_HOST_OR_FILE);
$routing = new Route($request);
$routing->run();
