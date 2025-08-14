@props(['img', 'alt', 'label', 'href' => '#'])

<a
    wire:navigate
    href="{{ $href }}"
    class="block text-center transition-all duration-300 hover:-translate-y-1 hover:shadow-lg rounded-lg p-2"
>
    <img
        src="{{ $img }}"
        alt="{{ $alt }}"
        class="mx-auto mb-2"
        width="80"
        height="80"
    />
    <p class="text-white text-xs">{{ $label }}</p>
</a>
