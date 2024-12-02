<?php

namespace App\Livewire;

use Livewire\Component;

class FundInfoCard extends Component
{
    public $fund;
    public function render()
    {
        return view('livewire.fund-info-card');
    }
}
