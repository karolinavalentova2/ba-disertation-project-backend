<?php
namespace App\Exceptions;

class MissingParameterError {
    private string $errorMessage;
    private int $statusCode;

    function __construct(string $message, int $statusCode) {
        $this->errorMessage = $message;
        $this->statusCode = $statusCode;
    }

    public function toJson(): string {
        return '{"message": "'. $this->errorMessage .'","statusCode": "'. $this->statusCode .'"}';
    }
}
