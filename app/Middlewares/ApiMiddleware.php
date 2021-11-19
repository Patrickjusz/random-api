<?php

namespace App\Middlewares;

use App\Helpers\Request;

class ApiMiddleware implements BaseMiddleware
{
    private static bool $enable = true;

    public static function run(Request $request)
    {
        if (self::$enable === true) {
            
        }
    }
}
