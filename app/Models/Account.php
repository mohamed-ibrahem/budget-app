<?php

namespace App\Models;

use App\Enums\AccountType;
use Illuminate\Database\Eloquent\Model;
use Parental\HasChildren;

class Account extends Model
{
    use HasChildren;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'type',
        'planned',
        'actual',
        'remaining',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, mixed>
     */
    protected $casts = [
        'type' => AccountType::class,
        'planned' => 'decimal:2',
        'actual' => 'decimal:2',
    ];

    /**
     * The children type aliases.
     *
     * @var array<int, class-string<Account>>
     */
    protected array $childTypes = [
        AccountType::Income->value => Income::class,
        AccountType::Expenses->value => Expenses::class,
        AccountType::Saving->value => Saving::class,
    ];
}
