<?php

namespace App\Livewire\Modals;

use Livewire\Component;

class MakeTransaction extends Component
{
    public $fund;
    public $specificFund;
    public function mount($fund = null, $specificFund = null)
    {
        $this->fund = $fund;
        $this->specificFund = $specificFund;
    }

    public function render()
    {
        return view('livewire.modals.make-transaction');
    }
}
