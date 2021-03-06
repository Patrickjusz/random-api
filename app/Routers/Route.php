<?php

namespace App\Routers;

use App\Helpers\Request;
use App\Helpers\JsonResponse;
use App\Controllers\RandomNumberController;

class Route
{
    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Run routing
     *
     * @return void
     */
    public function run(): void
    {
        $controller = new RandomNumberController($this->request);
        $path = $this->request->getPath();

        if ($path == 'generate' && $this->request->isHttpPost()) {
            $controller->index();
        } elseif (preg_match("/retrive\/(\d+)$/i", $path)) {
            $id = substr($path, strrpos($path, '/') + 1);
            $controller->show($id);
        } else {
            JsonResponse::error404();
        }
    }
}
