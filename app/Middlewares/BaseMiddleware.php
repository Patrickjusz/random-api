<?php

namespace App\Middlewares;

use App\Helpers\Request;

interface BaseMiddleware {
    public static function run(Request $request);
}