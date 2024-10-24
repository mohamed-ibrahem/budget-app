<?php

namespace App\Enums;

enum AccountType: int
{
    case Income = 1;
    case Saving = 2;
    case Expenses = 3;
}
