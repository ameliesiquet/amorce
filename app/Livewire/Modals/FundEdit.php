<?php

namespace App\Livewire\Modals;

use Livewire\Component;

class FundEdit extends Component
{
    public $specificFund;
    public function mount($specificFund = null)
    {
        $this->specificFund = $specificFund;
    }

    public function render()
    {
        return view('livewire.modals.fund-edit');
    }

}
