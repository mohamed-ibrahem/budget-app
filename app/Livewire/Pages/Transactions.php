<?php

namespace App\Livewire\Pages;

use App\Livewire\Concerns\InteractsWithPagination;
use App\Models\Transaction as TransactionModel;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Transactions extends Component
{
    use InteractsWithPagination;

    public function createPaginationChunk(): array
    {
        return TransactionModel::pluck('id')->chunk(15)->toArray();
    }

    public function render(): View
    {
        return view('livewire.pages.transactions');
    }
}
