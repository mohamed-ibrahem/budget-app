<h3
    x-accordion:trigger
    class="flex"
    @click="__toggle(item)"
    :data-state="__getDataState(item)"
>
    <button
        :data-state="__getDataState(item)"
        class="flex flex-1 items-center justify-between py-4 text-sm font-medium transition-all [&[data-state=open]]:text-indigo-500 [&[data-state=open]>svg]:rotate-180"
    >
        {{ $slot }}

        <x-lucide-chevron-down class="size-5" />
    </button>
</h3>
