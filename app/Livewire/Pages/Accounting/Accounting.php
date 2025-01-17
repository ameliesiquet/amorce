<?php
namespace App\Livewire\Pages\Accounting;

use App\Models\Fonds;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Accounting extends Component
{
    use WithPagination;

    public $funds;
    public $specificFunds;
    public $search = '';


    public function mount(): void
    {
        $this->funds = Fonds::where('specific', false)->get();

        $this->specificFunds = Fonds::where('specific', true)->get();
    }



    public function openmodal($which, $model = null): void
    {
        $this->dispatch('openmodal', $which, $model);
    }




    public function render()
    {
        return view('livewire.pages.accounting.accounting', [
            'funds' => $this->funds,
            'specificFunds' => $this->specificFunds,
        ]);
    }
}
