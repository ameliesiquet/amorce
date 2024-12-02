<?php

namespace App\Livewire\Components;

use Livewire\Component;

class AccountingCards extends Component
{
    public $accCards= [
        [
            'title' => 'Revenue',
            'time' => 'Dernier mois',
            'value' => 11032,
            'percentage' => 8.79,
            'color' => 'green-600'
        ],
        [
            'title' => 'Expenses',
            'time' => 'Dernier mois',
            'value' => 8032,
            'percentage' => -8.79,
            'color' => 'red-600',
        ]
    ];

    public function render()
    {
        return view('livewire.components.accounting-cards');
    }
}
