<?php

namespace App\Exception;

/**
 * Thrown when user input validation fails
 */
class ValidationException extends ApplicationException
{
    protected int $statusCode = 422;
    protected array $errors = [];

    public function __construct(string $message = 'Validation failed', array $errors = [])
    {
        parent::__construct($message);
        $this->errors = $errors;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
