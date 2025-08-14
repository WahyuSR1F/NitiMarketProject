<?php

namespace App\Traits;

trait AlertService
{
    /**
     * Create a new class instance.
     */
    public function alert($title, $text = '', $icon = 'info', $confirm = 'OK')
    {
        $this->dispatch('swal:alert', [
            'title' => $title,
            'text' => $text,
            'icon' => $icon,
            'confirmButtonText' => $confirm
        ]);
    }

    public function toast($title, $icon = 'success', $timer = 3000)
    {
        $this->dispatch('swal:toast', [
            'title' => $title,
            'icon' => $icon,
            'timer' => $timer
        ]);
    }

}
