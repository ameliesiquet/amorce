<?php

namespace App\Livewire;

use App\Models\Fonds;
use Livewire\Component;

class SpecificFundCard extends Component
{
    public Fonds $specificFund;

    public function mount(Fonds $fund)
    {
        $this->specificFund = $fund;
    }

    public function openmodal($which, $model = null): void
    {
        $this->dispatch('openmodal', $which, $model);
    }

    public function render()
    {
        return view('livewire.specific-fund-card');
    }
}
