<?php

namespace App\Livewire\Components;

use Livewire\Component;

class FundInfoCards extends Component
{
    public $fundInfoCards= [
        [
            'title' => 'Total',
            'amount' => 14869,
            'bgColor' => 'amber-200',
        ],
        [
            'title' => 'Revenus',
            'amount' => 11032,
            'bgColor' => 'white',
        ],
        [
            'title' => 'Dépenses',
            'amount' => 6789,
            'bgColor' => 'white',
        ],

    ];
    public function render()
    {
        return view('livewire.components.fund-info-cards');
    }
}
