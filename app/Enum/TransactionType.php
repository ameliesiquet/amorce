<?php

namespace App\Enum;

enum TransactionType: string
{
    case CSV = 'Virement bancaire';
    case CASH = 'Cash';

}
