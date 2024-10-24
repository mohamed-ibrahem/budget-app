<?php

namespace App\Livewire\Pages;

use App\Livewire\Concerns\InteractsWithPagination;
use App\Models\Transaction;
use Carbon\CarbonInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Daily extends Component
{
    use InteractsWithPagination;

    #[Locked]
    public array $balance = [];

    #[Locked]
    public int $total = 300;

    public function mount(): void
    {
        $this->mergeBalancesFor($this->chunks[0]);
    }

    public function createPaginationChunk(): array
    {
        $start = new Carbon('first day of this month');
        $to = Carbon::now();

        return array_chunk(array_reverse(
            $start->toPeriod($to, 1, 'Day')->toArray()
        ), 9);
    }

    public function loadMore(): void
    {
        if (!$this->hasMorePages()) {
            return;
        }

        $this->page = $this->page + 1;

        $this->mergeBalancesFor($this->chunks[$this->page - 1]);
    }

    public function mergeBalancesFor(array $chunk): void
    {
        $this->balance = [
            ...$this->balance,
            ...Transaction::query()
                ->where('to_account_id', 3)
                ->whereIn(DB::raw("DATE(date)"), array_map(fn(CarbonInterface $date) => $date->format('Y-m-d'), $chunk))
                ->groupBy('date')
                ->select([
                    DB::raw('SUM(amount) as total'),
                    DB::raw('Date(date) as date'),
                ])
                ->pluck('total', 'date')
                ->toArray()
        ];
    }

    public function getDayName(CarbonInterface $day): string
    {
        $position = $day->diffInHours();

        if ($position < 24) {
            return 'اليوم';
        }

        if ($position > (24 * 8)) {
            return $day->translatedFormat('l d, F');
        }

        return $day->diffForHumans([
            'options' => CarbonInterface::ONE_DAY_WORDS | CarbonInterface::TWO_DAY_WORDS,
        ]);
    }

    public function render(): View
    {
        return view('livewire.pages.daily');
    }
}
