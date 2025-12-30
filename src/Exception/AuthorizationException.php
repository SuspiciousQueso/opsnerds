<?php

namespace App\Exception;

/**
 * Thrown when user lacks permission for an action
 */
class AuthorizationException extends ApplicationException
{
    protected int $statusCode = 403;
}
