<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Actions\AddTransaction;
use App\Models\Expenses;
use App\Models\Income;
use App\Models\Saving;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @throws \Exception
     */
    public function run(): void
    {
        $salary = Income::create([
            'name' => 'الدخل',
        ]);
        $saving = Saving::create([
            'name' => 'المدخرات',
        ]);
        $home = Expenses::create([
            'name' => 'البيت',
            'planned' => 17000,
        ]);
        $installments = Expenses::create([
            'name' => 'الاستلزمات الشهرية',
            'planned' => 41600,
        ]);
        $msroof = Expenses::create([
            'name' => 'المصروف',
            'planned' => 5000,
        ]);
        Expenses::create([
            'name' => 'اخرى',
        ]);

        app(AddTransaction::class)->handle(
            from: null,
            to: $salary,
            amount: 97000,
            date: Carbon::create(2024, 10),
            description: 'راتب شهر 10 🎉',
        );
        app(AddTransaction::class)->handle(
            from: null,
            to: $saving,
            amount: 10000,
            date: Carbon::create(2024, 8),
            description: 'مع محمود',
        );

        app(AddTransaction::class)->handle(
            from: $salary,
            to: $msroof,
            amount: 2000,
            date: Carbon::create(2024, 10),
            description: 'راتب هيام ❤️',
        );
        app(AddTransaction::class)->handle(
            from: $salary,
            to: $msroof,
            amount: 1000,
            date: Carbon::create(2024, 10),
            description: 'مصروفي 🥲',
        );
        app(AddTransaction::class)->handle(
            from: $salary,
            to: $msroof,
            amount: 2000,
            date: Carbon::create(2024, 10),
            description: 'بنزين العربية',
        );
        app(AddTransaction::class)->handle(
            from: $salary,
            to: $installments,
            amount: 16800,
            date: Carbon::create(2024, 10),
            description: 'قرض العربية',
        );
        app(AddTransaction::class)->handle(
            from: $salary,
            to: $installments,
            amount: 8000,
            date: Carbon::create(2024, 10),
            description: 'قرض الشقة',
        );
        app(AddTransaction::class)->handle(
            from: $salary,
            to: $installments,
            amount: 8000,
            date: Carbon::create(2024, 10, 15),
            description: 'قرض النادي',
        );
        app(AddTransaction::class)->handle(
            from: $salary,
            to: $installments,
            amount: 8800,
            date: Carbon::create(2024, 10),
            description: 'ايجار الشقة',
        );
        app(AddTransaction::class)->handle(
            from: $salary,
            to: $installments,
            amount: 10000,
            date: Carbon::create(2024, 10),
            description: 'قسط فاليو',
        );

        foreach ([
             ['day' => 5, 'amount' => 300],
             ['day' => 6, 'amount' => 300],
             ['day' => 7, 'amount' => 474],
             ['day' => 8, 'amount' => 200],
             ['day' => 9, 'amount' => 300],
             ['day' => 10, 'amount' => 50],
             ['day' => 11, 'amount' => 150],
             ['day' => 12, 'amount' => 500],
             ['day' => 13, 'amount' => 560],
             ['day' => 14, 'amount' => 410],
             ['day' => 15, 'amount' => 900],
             ['day' => 16, 'amount' => 155],
             ['day' => 20, 'amount' => 300],
             ['day' => 21, 'amount' => 280],
             ['day' => 22, 'amount' => 270],
             ['day' => 23, 'amount' => 840],
             ['day' => 24, 'amount' => 270],
         ] as $dailyData) {
            app(AddTransaction::class)->handle(
                from: null,
                to: $home,
                amount: $dailyData['amount'],
                date: Carbon::create(2024, 10, $dailyData['day']),
            );
        }

    }
}
