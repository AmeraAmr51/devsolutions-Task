<?php

namespace App\Http\Middleware;

use App\Http\Traits\HttpResponse;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    use HttpResponse;
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : abort($this->errorResponse("error",'Unauthenticated',403));
        ;
    }
}