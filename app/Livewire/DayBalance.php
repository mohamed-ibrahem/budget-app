<?php

namespace App\Livewire;

use App\Models\Transaction;
use Carbon\CarbonInterface;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Locked;
use Livewire\Component;

class DayBalance extends Component
{
    #[Locked]
    public float $balance = 0;

    public function mount(float $balance): void
    {
        $this->balance = $balance;
    }

    public function render(): View
    {
        return view('livewire.day-balance');
    }
}
