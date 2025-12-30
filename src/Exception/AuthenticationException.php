<?php

namespace App\Exception;

/**
 * Thrown when authentication fails
 */
class AuthenticationException extends ApplicationException
{
    protected int $statusCode = 401;
}
