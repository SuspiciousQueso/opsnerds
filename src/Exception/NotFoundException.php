<?php

namespace App\Exception;

/**
 * Thrown when a requested resource is not found
 */
class NotFoundException extends ApplicationException
{
    protected int $statusCode = 404;
}
