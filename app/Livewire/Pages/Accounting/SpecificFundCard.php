<?php

namespace App\Livewire\Pages\Accounting;

use App\Models\Fonds;
use Livewire\Component;

class SpecificFundCard extends Component
{
    public Fonds $specificFund;
    public $search ='';

    public function mount(Fonds $fund)
    {
        $this->specificFund = $fund;
    }

    public function openmodal($which, $modelId = null): void
    {
        $this->dispatch('openmodal', $which, $modelId);
    }



    public function render()
    {
        return view('livewire.pages.accounting.specific-fund-card');
    }
}
