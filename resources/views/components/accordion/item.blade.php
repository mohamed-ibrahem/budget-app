@props(['value'])

<div
    x-accordion:item
    x-data="{ item: '{{ $value }}' }"
    :data-state="__getDataState(item)"
>
    {{ $slot }}
</div>
