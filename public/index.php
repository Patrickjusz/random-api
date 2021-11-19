<?php

require_once '../vendor/autoload.php';
require_once '../config/api.php';

use App\Controllers\RandomNumberController;
use App\Database\Database;
use App\Helpers\Request;

$route = $_GET['route'] ?? '';
$params = $_POST ?? [];
$headers = getallheaders() ?? [];

$request = new Request($route, $params, $headers);

// @TODO MISSING ROUTING ;(
$database = Database::factory(DATABASE_TYPE, DATABASE_HOST_OR_FILE);
$controller = new RandomNumberController($request);
$requestPath = $request->getPath();

switch ($requestPath) {
    case 'generate':
        //POST
        $controller->index();
        break;
    case strpos($requestPath, 'generate') === 0:
        //GET
        $id = substr($requestPath, strrpos($requestPath, '/') + 1);
        if ($id > 0) {
            $controller->show($id);
        }
        break;
    case strpos($requestPath, 'retrive') === 0:
        //GET
        $id = substr($requestPath, strrpos($requestPath, '/') + 1);
        if ($id > 0) {
            $controller->show($id);
        }
        break;
    default:
        throw new \Exception("Bad route");
        break;
}


//INSERT INTO random_numbers('number') VALUES (12)
