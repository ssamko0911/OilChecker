<?php

namespace App\Exception;
class OpenAiException extends AbstractException
{
    private const string ERROR_CODE = 'ERROR_FETCHING_DATA';

    public function __construct(string $apiUrl, int $statusCode, string $errorMessage, ?\Throwable $previous = null)
    {
        $message = sprintf('Error fetching data from the API %s: %s', $apiUrl, $errorMessage);
        parent::__construct($message, self::ERROR_CODE, $previous, $statusCode);
    }
}
