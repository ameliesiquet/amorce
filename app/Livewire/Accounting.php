<?php

namespace App\Livewire;

use App\Models\Fonds;
use Livewire\Component;

class Accounting extends Component
{
    public $specificFunds;
    public $funds;

    public function render()
    {
        $this->specificFunds = Fonds::where('specific', true)->get();
        $this->funds = Fonds::where('specific', false)->get();
        return view('livewire.pages.accounting', ['specificFunds' => $this->specificFunds], ['funds' => $this->funds]);

    }
}
