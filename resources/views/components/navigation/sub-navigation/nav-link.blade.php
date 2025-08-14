
<li>
    <a wire:navigate {{ $attributes->merge(['class' => 'hover:text-primaryRed dark:hover:text-primaryRedLight']) }}>
        {{ $slot }}
    </a>
</li>
