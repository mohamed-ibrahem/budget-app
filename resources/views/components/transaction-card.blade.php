@props([
    'amount' => 0,
])

<div class="flex items-center gap-1 bg-gray-100 pt-6 pb-5 px-4 rounded-lg">
    <x-typography.small {{ $attributes->class(['flex-1']) }}>{{ $slot }}</x-typography.small>
    <x-typography.monay class="text-gray-500 font-semibold tracking-wider">
        {{ $amount }}
    </x-typography.monay>
</div>
