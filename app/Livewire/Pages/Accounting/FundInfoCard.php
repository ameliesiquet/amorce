<?php

namespace App\Livewire\Pages\Accounting;

use Livewire\Component;

class FundInfoCard extends Component
{
    public $fund;
    public function render()
    {
        return view('livewire.pages.accounting.fund-info-card');
    }
}
