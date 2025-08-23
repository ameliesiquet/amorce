<?php

namespace App\Livewire\Pages\Accounting;

use App\Models\Fonds;
use Livewire\Attributes\Computed;
use Livewire\Component;

class SpecificFunds extends Component
{
    public $search = '';
    protected $listeners = ['refresh-specific-funds' => '$refresh'];


    #[Computed]
    public function specificFunds()
    {
        return Fonds::where('specific', true)
            ->where('title', 'like', '%' . $this->search . '%')
            ->get();
    }

    public function refreshSpecificFunds()
    {
    }


    public function render()
    {
        return view('livewire.pages.accounting.specific-funds', [
            'specificFunds' => Fonds::where('specific', true)
                ->where('title', 'like', '%' . $this->search . '%')
                ->latest()
                ->get(),
        ]);
    }

}
