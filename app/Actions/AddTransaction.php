<?php

namespace App\Actions;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AddTransaction
{
    public function handle(?Account $from, ?Account $to, float $amount, Carbon $date, ?string $description = null): void
    {
        DB::transaction(function () use ($from, $amount, $date, $description, $to) {
            $transaction = Transaction::create([
                'to_account_id' => $to?->getKey(),
                'from_account_id' => $from?->getKey(),
                'description' => $description ?? $this->getTransactionName($from, $to),
                'date' => $date,
                'amount' => $amount,
            ]);

            $to?->update([
                'actual' => $to?->actual + $transaction->amount,
            ]);

            $from?->update([
                'actual' => $from?->actual - $transaction->amount,
            ]);
        });
    }

    private function getTransactionName(?Account $from, ?Account $to): string
    {
        if (! $to) {
            return 'عملية جديدة';
        }

        if ($from) {
            return sprintf('تحويل من %s الى %s', $from->name, $to->name);
        }

        return sprintf('مشتريات من مصروف %s', $to->name);
    }
}
