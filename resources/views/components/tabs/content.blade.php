@props([
    'value' => '',
])

<div x-show="__selected === '{{ $value }}'">{{ $slot }}</div>
