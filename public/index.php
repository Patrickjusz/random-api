<?php

require_once '../vendor/autoload.php';
require_once '../config/api.php';

use App\Controllers\RandomNumberController;
use App\Helpers\Request;

$route = $_GET['route'] ?? '';
$params = $_POST ?? [];
$headers = getallheaders() ?? [];

$request = new Request($route, $params, $headers);


// @TODO MISSING ROUTING ;(
$controller = new RandomNumberController($request);
$controller->index();