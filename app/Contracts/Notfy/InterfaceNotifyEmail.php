<?php

namespace App\Contracts\Notfy;

interface InterfaceNotifyEmail
{
    /**
     * Create a new class instance.
     */
    public function envelop (): Envelope;
    public function content (): Content;
    public function attachments (): array;
}
