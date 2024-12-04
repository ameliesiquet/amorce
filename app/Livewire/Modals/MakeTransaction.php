<?php

namespace App\Livewire\Modals;

use Livewire\Component;

class MakeTransaction extends Component
{
    public $fund;
    public function mount($fund = null)
    {
        $this->fund = $fund;
    }
    public function render()
    {
        return view('livewire.modals.make-transaction');
    }
}
