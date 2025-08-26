<?php

namespace App\Enum;

enum SelectionStatus: string
{
    case ACTIVE = 'Active';
    case PENDING = 'En attente';
    case CLOSED = 'Fermée';
}
