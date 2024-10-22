@props([
    'value' => '',
    'checked' => false,
])

<div>
    <x-radio-group.item
        :id=$value
        :$value
        :$checked
        class="peer sr-only"
    />

    <x-label
        :htmlFor=$value
        {{ $attributes->twMerge('flex flex-col items-center space-y-2 text-xs peer-checked:text-indigo-500') }}
    >
        {{ $slot }}
    </x-label>
</div>
