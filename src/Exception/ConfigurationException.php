<?php

namespace App\Exception;

/**
 * Thrown when configuration is invalid or missing
 */
class ConfigurationException extends ApplicationException
{
    protected int $statusCode = 500;
}
