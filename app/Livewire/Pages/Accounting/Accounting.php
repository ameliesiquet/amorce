<?php

namespace App\Livewire\Pages\Accounting;

use App\Models\Fonds;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;


class Accounting extends Component
{
    use WithPagination;
    public $funds;

    public $search ='';

    public $specificFunds;

    public function mount(): void
    {
        $this->funds = Fonds::where('specific', false)->get();
    }

    #[Computed]
    public function specificFunds()
    {
        return Fonds::where('specific', true)
            ->filter(['search' => $this->search])
            ->orderBy('title')
            ->get();
    }


    public function openmodal($which, $model = null): void
    {
        $this->dispatch('openmodal', $which, $model);
    }


    public function render()
    {

        return view('livewire.pages.accounting.accounting', [
            'funds' => $this->funds,
        ]);
    }


}
