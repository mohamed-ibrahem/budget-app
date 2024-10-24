<?php

use App\Enums\AccountType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('type');
            $table->decimal('planned', 10, 2)->default(0);
            $table->decimal('actual', 10, 2)->default(0);
            $table->decimal('remaining', 10, 2)->storedAs(sprintf(
                "CASE WHEN type = %s THEN planned - actual ELSE 0 END",
                AccountType::Expenses->value
            ));
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
