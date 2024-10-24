<div>
    @for ($chunk = 0; $chunk < $page; $chunk++)
        @foreach($chunks[$chunk] as $day)
            <x-accordion.item value="item-{{ $chunk }}-{{ $loop->index }}">
                <x-card class="py-0 px-2">
                    <x-card.header class="p-0 sticky top-52 backdrop-blur-sm bg-white/80 z-10">
                        <x-accordion.trigger>
                            @slot('amount')
                                1000
                            @endslot
                            {{ $this->getDayName($day) }}
                        </x-accordion.trigger>
                    </x-card.header>
                    <x-card.content class="p-0">
                        <x-accordion.content class="pb-2">
                            <livewire:daily-transaction :date="$day" :lazy="true"/>
                        </x-accordion.content>
                    </x-card.content>
                </x-card>
            </x-accordion.item>
        @endforeach
    @endfor

</div>
