<?php

namespace App\Exception;
use Exception;

class AbstractException extends Exception
{
    private string $errorCode; // internal info?
    private int $statusCode; // http ?? 500

    public function __construct(string $message, string $errorCode, ?\Throwable $previous = null, int $statusCode = 500) // prev == Guzzle Exc ?
    {
        parent::__construct($message, 0, $previous);
        $this->errorCode = $errorCode;
        $this->statusCode = $statusCode;
    }

    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
}