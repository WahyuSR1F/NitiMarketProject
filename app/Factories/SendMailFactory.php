<?php

namespace App\Factories;

class SendMailFactory
{
    /**
     * Create a new class instance.
     */
    public function engine (string $method): \App\Contracts\Notfy\InterfaceNotifyEmail{
        return match ($method) {
            'otp' => new \App\Mail\SendOtpMail(),
            default => throw new \Exception('Unknown LoginRequest method'),
        };
    }
}
