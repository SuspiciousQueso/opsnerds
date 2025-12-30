<?php

namespace App\Exception;

use Exception;

/**
 * Base exception for all application exceptions
 */
class ApplicationException extends Exception
{
    protected int $statusCode = 500;

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
}
