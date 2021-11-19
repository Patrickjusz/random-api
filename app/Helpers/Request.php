<?php

namespace App\Helpers;

use App\Middlewares;
use Exception;

class Request
{
    private string $path;
    private array $params;
    private array $headers;
    private array $middlewares;

    public function __construct(string $route, array $param, array $headers, array $middlewares = [])
    {
        $this->path = $route ?? '';
        $this->params = $param ?? [];
        $this->headers = $headers ?? [];
        $this->middlewares = $middlewares;

        $this->runMiddlewers();
    }


    public function runMiddlewers()
    {
        foreach ($this->middlewares as $middlewareName) {
            $fullMiddlewareName = MIDDLEWARE_PATH . '\\' . $middlewareName;
            if (class_exists($fullMiddlewareName)) {
                $fullMiddlewareName::run($this);
            } else {
                throw new \Exception("Middleware {$fullMiddlewareName} not exists!");
            }
        }
        die();
    }

    /**
     * Get the value of path
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Get the value of params
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Get the value of headers
     */
    public function getHeaders()
    {
        return $this->headers;
    }
}
