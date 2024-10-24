<div
    x-cloak
    x-show="__isOpen(item)"
    x-collapse
    {{ $attributes->twMerge('overflow-hidden text-sm') }}
>
    {{ $slot }}
</div>
