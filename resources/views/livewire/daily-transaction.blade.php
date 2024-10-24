<div class="flex flex-col gap-2">
    @forelse($transactions as $transaction)
        <x-transaction-card :amount="$transaction->amount">
            {{ $transaction->description }}
        </x-transaction-card>
    @empty
        <div class="bg-indigo-50 pt-6 pb-5 px-4 rounded-lg">
            <x-typography.small class="text-center">
                🎉 <strong>رائع!</strong>
                لم نقم بصرف مصروف اليوم!
            </x-typography.small>
        </div>
    @endforelse
</div>
