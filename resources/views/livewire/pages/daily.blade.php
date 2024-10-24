<div>
    <div class="fixed inset-x-3 top-28 z-50">
        <x-card class="p-6 shadow-xl backdrop-blur-sm bg-white/95 flex items-center justify-between">
            <div class="inline-flex flex-col gap-2">
                <x-card.title>رصيد اليوم</x-card.title>
                <x-card.description>{{ today()->translatedFormat('l d, F') }}</x-card.description>
            </div>
            <div class="relative">
                <x-typography.h1 class="text-7xl h-12">
                    <span class="inline-block">{{ $total - $balance[today()->toDateString()] ?? 0 }}</span>
                    <x-typography.small class="absolute -top-2 left-0 drop-shadow-[1px_1px_0_rgba(255,255,255,1)]">جنية</x-typography.small>
                </x-typography.h1>
            </div>
        </x-card>
    </div>

    <div class="mt-16">
        <x-accordion type="multiple" defaultValue="item-0-0" collapsible class="space-y-4">
            @for ($chunk = 0; $chunk < $page; $chunk++)
                @foreach($chunks[$chunk] as $day)
                    <x-accordion.item value="item-{{ $chunk }}-{{ $loop->index }}" key="accordion.item-{{ $chunk }}-{{ $loop->index }}">
                        <x-card key="card-{{ $chunk }}-{{ $loop->index }}" class="py-0 px-2">
                            <x-card.header key="card.header-{{ $chunk }}-{{ $loop->index }}" class="p-0 sticky top-52 backdrop-blur-sm bg-white/80 z-10">
                                <x-accordion.trigger key="accordion.trigger-{{ $chunk }}-{{ $loop->index }}">
                                    @slot('amount')
                                        <livewire:day-balance key="day-balance-{{ $chunk }}-{{ $loop->index }}" :balance="$balance[$day->toDateString()] ?? 0" />
                                    @endslot
                                    {{ $this->getDayName($day) }}
                                </x-accordion.trigger>
                            </x-card.header>
                            <x-card.content key="card.content-{{ $chunk }}-{{ $loop->index }}" class="p-0">
                                <x-accordion.content key="accordion.content-{{ $chunk }}-{{ $loop->index }}" class="pb-2">
                                    <livewire:daily-transaction key="daily-transaction-{{ $chunk }}-{{ $loop->index }}" :date="$day" :lazy="true"/>
                                </x-accordion.content>
                            </x-card.content>
                        </x-card>
                    </x-accordion.item>
                @endforeach
            @endfor
        </x-accordion>

        @if ($this->hasMorePages())
            <button x-intersect="$wire.loadMore">جارِ تحميل المزيد....</button>
        @endif
    </div>
</div>
