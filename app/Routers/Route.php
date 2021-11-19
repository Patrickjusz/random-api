<?php

namespace App\Routers;

use App\Helpers\Request;
use App\Helpers\JsonResponse;
use App\Controllers\RandomNumberController;

class Route
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function run()
    {
        $controller = new RandomNumberController($this->request);
        $path = $this->request->getPath();

        switch ($path) {
        case ($path == 'generate' && !$this->request->isHttpPost()):
            $controller->index();
            break;
        case (preg_match("/retrive\/(\d+)$/i", $path)):
            $id = substr($path, strrpos($path, '/') + 1);
            $controller->show($id);
            break;
        default:
            JsonResponse::error404();
        }
    }
}
