<?php
namespace App\Exceptions;

class RouteError {
    private string $errorMessage;

    function __construct(string $message) {
        $this->errorMessage = $message;
    }

    public function toJson(): string {
        return '{"message": "'. $this->errorMessage .'"}';
    }
}
