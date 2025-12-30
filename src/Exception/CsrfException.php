<?php

namespace App\Exception;

/**
 * Thrown when CSRF token validation fails
 */
class CsrfException extends ApplicationException
{
    protected int $statusCode = 419;

    public function __construct(string $message = 'CSRF token mismatch')
    {
        parent::__construct($message);
    }
}
