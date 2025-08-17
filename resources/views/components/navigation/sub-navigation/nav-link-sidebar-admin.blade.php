@props([ 'href' => '#', 'icon' => '', 'active' => false ])

<a
    wire:navigate
    href="{{ $href }}"
    class="flex items-center space-x-3 px-4 py-3 rounded-lg font-semibold transition-colors 
    {{
        $active
            ? 'text-white bg-primary-light dark:bg-primary-light/40 shadow-md'
            : 'hover:bg-primary-light/80 dark:hover:bg-primary-light/30'
    }}"
>
    <i class="{{ $icon }} w-5"></i>
    <span>{{ $slot }}</span>
</a>
