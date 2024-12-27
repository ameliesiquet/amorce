<?php

namespace App\Livewire\Modals;

use App\Models\Fonds;
use Livewire\Component;

class MakeTransaction extends Component
{
    public $fund;
    public $funds;
    public $specificFund;


    public function mount($fund = null, $specificFund = null)
    {
        $this->fund = $fund;
        $this->funds = Fonds::all();

        $this->specificFund = $specificFund;
    }

    public function render()
    {
        return view('livewire.modals.make-transaction');
    }
}
