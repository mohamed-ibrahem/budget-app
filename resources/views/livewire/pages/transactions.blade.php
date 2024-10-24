@php
    use App\Models\Transaction;
@endphp
<div class="mt-4 flex flex-col gap-2">
    @for ($chunk = 0; $chunk < $page; $chunk++)
        @php
            $transactions = Transaction::whereIn('id', $chunks[$chunk])->get(['id', 'amount', 'date', 'description']);
        @endphp

        @forelse($transactions as $transaction)
            <x-transaction-card :amount="$transaction->amount" class="inline-flex flex-col space-y-2">
                <span>{{ $transaction->description }}</span>
                <span class="text-muted-foreground">{{ $transaction->date->translatedFormat('l d, F') }}</span>
            </x-transaction-card>
        @empty
            <div class="p-4 pb-3">
                <x-typography.small class="flex-1">لا عمليات بعد.</x-typography.small>
            </div>
        @endforelse
    @endfor

    @if ($this->hasMorePages())
        <button x-intersect="$wire.loadMore">جارِ تحميل المزيد....</button>
    @endif
</div>
