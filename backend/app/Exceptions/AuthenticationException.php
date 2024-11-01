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
                "error" => "No autenticado",
                "message" => "Debe estar autenticado para acceder a este recurso.."
            ],
            401
        );
    }
}
