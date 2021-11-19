<?php

namespace App\Middlewares;

use App\Helpers\Request;
use App\Helpers\JsonResponse;
use App\Helpers\ResponseInterface;

class ApiMiddleware implements BaseMiddleware
{
    private static bool $enable = true;

    public static function run(Request $request): void
    {
        if (self::$enable === true) {
            if (self::isValidated($request->getHeaders())) {
                self::next();
            } else {
                self::stop();
            }
        }
    }

    private static function isValidated($headers): bool
    {
        return API_PROTECTION_ENABLE == false || (isset($headers[API_HTTP_HEADER_NAME]) && $headers[API_HTTP_HEADER_NAME] == API_KEY);
    }

    public static function next(): void
    {
        //@TODO: Its ok! Fox example: Add to api log....;
    }

    public static function stop(): ResponseInterface
    {
        new JsonResponse(['Bad api key'], 403);
        die();
    }
}
