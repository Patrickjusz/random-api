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
        $controller = new RandomNumberController($this->request);
        $path = $this->request->getPath();

        if ($path == 'generate') {
            $controller->index();
        } else if (strpos($path, 'generate') === 0) {
            $controller->show($this->getId($path));
        } else if (strpos($path, 'retrive') === 0) {
            $controller->show($this->getId($path));
        } else {
            throw new \Exception("Bad route");
        }
    }

    private function getId($path): int
    {
        return substr($path, strrpos($path, '/') + 1);
    }
}
