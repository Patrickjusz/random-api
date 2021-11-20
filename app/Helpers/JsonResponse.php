<?php

namespace App\Helpers;

use App\Helpers\ResponseInterface;

/**
 * JsonResponse
 */
class JsonResponse implements ResponseInterface
{
    
    /**
     * __construct
     *
     * @param  array $data
     * @param  int   $httpCode
     * @return void
     */
    public function __construct(array $data, int $httpCode = 200)
    {
        $this->setHeaders();
        $this->setHttpCode($httpCode);
        echo json_encode($data);
        die();
    }

    /**
     * Set HTTP json header
     *
     * @return void
     */
    private function setHeaders()
    {
        header('Content-Type: application/json; charset=utf-8');
    }

    /**
     * Set HTTP response code
     *
     * @param  mixed $httpCode
     * @return int
     */
    private function setHttpCode($httpCode): int
    {
        return (int)http_response_code($httpCode);
    }

    /**
     * Return error 404
     *
     * @return void
     */
    public static function error404()
    {
        new JsonResponse(['Error 404'], 404);
    }
}
