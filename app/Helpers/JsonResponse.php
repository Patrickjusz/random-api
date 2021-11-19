<?php

namespace App\Helpers;

use App\Helpers\ResponseInterface;

class JsonResponse implements ResponseInterface
{
    public function __construct(array $data)
    {
        $this->getHeaders();
        echo json_encode($data);
    }

    private function getHeaders() {
        header('Content-Type: application/json; charset=utf-8');
    }
}
