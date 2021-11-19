<?php

namespace App\Helpers;

class Request
{
    private string $path;
    private array $params;
    private array $headers;

    public function __construct(string $route, array $param, array $headers)
    {
        $this->path = $route ?? '';
        $this->params = $param ?? []; 
        $this->headers = $headers ?? [];
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
