<?php

namespace App\Exceptions;

use Illuminate\Contracts\Debug\ShouldntReport;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthenticationException extends \Illuminate\Auth\AuthenticationException implements ShouldntReport
{
    /**
     * Render the exception into an HTTP response.
     */
    public function render(Request $request): Response
    {
        return response(
            [
                'message' => __('They must be authenticated to access this resource.'),
                'error' => __('Unauthenticated'),
                'status' => __('error'),
            ],
            401
        );
    }
}
