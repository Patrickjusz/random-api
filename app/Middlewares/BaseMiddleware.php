<?php

namespace App\Middlewares;

use App\Helpers\Request;
use App\Helpers\ResponseInterface;

interface BaseMiddleware
{
    public static function run(Request $request): void;
    public static function next(): void;
    public static function stop(): ResponseInterface;
}
