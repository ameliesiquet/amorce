<?php

namespace App\Livewire;

use App\Models\Fonds;
use Livewire\Component;

class FundCard extends Component
{
    public Fonds $fund;


    public function mount(Fonds $fund)
    {
        $this->fund = $fund;
    }

    public function render()
    {
        return view('livewire.fund-card');
    }
}
