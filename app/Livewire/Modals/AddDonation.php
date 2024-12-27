<?php

namespace App\Livewire\Modals;

use App\Models\Fonds;
use Livewire\Component;

class AddDonation extends Component
{
    public $funds = [];

    public function mount(): void
    {
        $this->funds = Fonds::all();
    }

    public function render()
    {
        return view('livewire.modals.add-donation');
    }
}
