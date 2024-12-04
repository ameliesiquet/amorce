<?php

namespace App\Livewire;

use App\Models\Fonds;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;



class Accounting extends Component
{
    use WithPagination;
    public $funds;

    public $search ='';

    public $specificFunds;

    public function updatedSearch()
    {
        $this->resetPage();
    }

    #[Computed]
    public function specificFunds()
    {
        return Fonds::where('specific', true)
            ->filter(['search' => $this->search])
            ->orderBy('title')
            ->get();

    }


    public function render()
    {

        $this->funds = Fonds::where('specific', false)->get();

        return view('livewire.pages.accounting', [
            'funds' => $this->funds,
        ]);
    }


}
