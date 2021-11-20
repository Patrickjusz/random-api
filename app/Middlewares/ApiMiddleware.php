<?php

namespace App\Middlewares;

use App\Helpers\Request;
use App\Helpers\JsonResponse;
use App\Helpers\ResponseInterface;

class ApiMiddleware implements BaseMiddleware
{
    private static bool $enable = true;
    
    /**
     * Run middleware
     *
     * @param  Request $request
     * @return void
     */
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
    
    /**
     * isValidated
     *
     * @param  mixed $headers
     * @return bool
     */
    private static function isValidated($headers): bool
    {
        $isEnableProtection = (API_PROTECTION_ENABLE == false);
        $isCorrectApiKey = (isset($headers[API_HTTP_HEADER_NAME]) && $headers[API_HTTP_HEADER_NAME] == API_KEY);
        return $isEnableProtection || $isCorrectApiKey;
    }
    
    /**
     * next
     *
     * @return void
     */
    public static function next(): void
    {
        //@TODO: Its ok! Fox example: Add to api log....;
    }
    
    /**
     * stop
     *
     * @return ResponseInterface
     */
    public static function stop(): ResponseInterface
    {
        new JsonResponse(['Bad api key'], 403);
        die();
    }
}
