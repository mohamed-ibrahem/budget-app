<?php

namespace App\Livewire;

use App\Models\Transaction as TransactionModel;
use Carbon\CarbonInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Attributes\Locked;
use Livewire\Component;

class DailyTransaction extends Component
{
    /**
     * @var Collection<TransactionModel>
     */
    #[Locked]
    public Collection $transactions;

    public function mount(CarbonInterface $date): void
    {
        $this->transactions = TransactionModel::query()
            ->whereDate('date', $date)
            ->where('to_account_id', 3)
            ->orderBy('date')
            ->get(['id', 'amount', 'description']);
    }

    public function placeholder(): string
    {
        return view('components.transaction-card', [
            'amount' => '0.00',
            'slot' => 'جار التحميل'
        ]);
    }

    public function render(): View
    {
        return view('livewire.daily-transaction');
    }
}
