<h3
    x-accordion:trigger
    class="flex"
    @click="__toggle(item)"
    :data-state="__getDataState(item)"
>
    <button
        :data-state="__getDataState(item)"
        class="flex flex-1 items-center justify-between py-4 text-sm font-medium"
    >
        <span>{{ $slot }}</span>

        <x-badge variant="secondary">
            <x-typography.monay>{{ $amount }}</x-typography.monay>
        </x-badge>
    </button>
</h3>
