<?php

namespace App\Helpers;

use App\Helpers\ResponseInterface;

class JsonResponse implements ResponseInterface
{
    public function __construct(array $data, int $httpCode = 200)
    {
        $this->setHeaders();
        $this->setHttpCode($httpCode);
        echo json_encode($data);
    }

    private function setHeaders()
    {
        header('Content-Type: application/json; charset=utf-8');
    }

    private function setHttpCode($httpCode): int
    {
        return (int)http_response_code($httpCode);
    }
}
