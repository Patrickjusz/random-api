<?php

namespace App\Routers;

use App\Controllers\RandomNumberController;

class Route
{
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function run()
    {
        $requestPath = $this->request->getPath();
        $controller = new RandomNumberController($this->request);

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
    }
}
