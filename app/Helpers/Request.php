<?php

namespace App\Helpers;

use App\Middlewares;
use Exception;

class Request
{
    private string $path;
    private string $httpMehtod;
    private array $params;
    private array $headers;
    private array $middlewares;
    
    /**
     * __construct
     *
     * @param  string $route
     * @param  array  $param
     * @param  array  $headers
     * @param  array  $middlewares
     * @return void
     */
    public function __construct(string $route, array $param, array $headers, array $middlewares = [])
    {
        $this->path = $route ?? '';
        $this->params = $param ?? [];
        $this->headers = $headers ?? [];
        $this->middlewares = $middlewares;
        $this->httpMehtod = $_SERVER['REQUEST_METHOD'] ?? '';

        $this->runMiddlewers();
    }
    
    /**
     * Run all middlewares
     *
     * @return void
     */
    public function runMiddlewers(): void
    {
        foreach ($this->middlewares as $middlewareName) {
            $fullMiddlewareName = MIDDLEWARE_PATH . '\\' . $middlewareName;
            if (class_exists($fullMiddlewareName)) {
                $fullMiddlewareName::run($this);
            } else {
                throw new \Exception("Middleware {$fullMiddlewareName} not exists!");
            }
        }
    }

    /**
     * getPath
     *
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

       
    /**
     * getParams
     *
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

        
    /**
     * getHeaders
     *
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    
    /**
     * Get HTTP method
     *
     * @return string
     */
    public function getHttpMehtod(): string
    {
        return $this->httpMehtod;
    }

    /**
     * Check is HTTP POST method
     *
     * @return bool
     */
    public function isHttpPost(): bool
    {
        return  (bool)($this->getHttpMehtod() == 'POST');
    }
}
