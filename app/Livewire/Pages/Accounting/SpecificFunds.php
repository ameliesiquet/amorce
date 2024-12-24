<?php

namespace App\Livewire\Pages\Accounting;

use App\Models\Fonds;
use Livewire\Attributes\Computed;
use Livewire\Component;

class SpecificFunds extends Component
{
    public $search = '';
    #[Computed]
    public function specificFunds()
    {
        return Fonds::where('specific', true)
            ->where('title', 'like', '%' . $this->search . '%')
            ->get();
    }

    public function render()
    {
        return view('livewire.pages.accounting.specific-funds');
    }
}
