<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\Main\Helpers\Response;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return (new \App\Main\Helpers\Response)->responseJsonFail("Not authenticated",Response::HTTP_CODE_UNAUTHORIZED);
        }

    }
}
