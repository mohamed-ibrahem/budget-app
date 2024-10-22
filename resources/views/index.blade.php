<x-layouts title="الرئيسية">
    <x-tabs defaultValue="daily">
        <section class="container">
            <div class="overflow-y-auto h-[calc(100vh-140px)]">
                <x-tabs.content value="daily">
                    <livewire:pages.daily />
                </x-tabs.content>
                <x-tabs.content value="monthly">
                    <livewire:pages.monthly />
                </x-tabs.content>
                <x-tabs.content value="transactions">
                    <livewire:pages.transactions />
                </x-tabs.content>
            </div>
        </section>

        <footer class="bg-white py-2">
            <x-tabs.list>
                <x-tabs.trigger value="daily">
                    <x-lucide-calendar-arrow-up class="size-5" />
                    <span>اليومية</span>
                </x-tabs.trigger>
                <x-tabs.trigger value="monthly">
                    <x-lucide-calendar class="size-5" />
                    <span>المصروف الشهري</span>
                </x-tabs.trigger>
                <x-tabs.trigger value="transactions">
                    <x-lucide-arrow-left-right class="size-5" />
                    <span>العمليات</span>
                </x-tabs.trigger>
            </x-tabs.list>
        </footer>
    </x-tabs>
</x-layouts>
