<?php

namespace App\Livewire;

use App\Models\Fonds;
use Livewire\Attributes\Computed;
use Livewire\Component;
use \Livewire\WithPagination;


class FundCard extends Component
{
    use WithPagination;

    public Fonds $fund;
    public $search ='';


    public function mount(Fonds $fund)
    {
        $this->fund = $fund;
    }

    #[Computed]
    public function transactions()
    {
        return $this->fund->transactions()
            ->where('transaction_type', 'like', '%' . $this->search . '%') // Beispiel für Filterung
            ->paginate(5);
    }

    public function openmodal($which, $model = null): void
    {
        $this->dispatch('openmodal', $which, $model);
    }

    public function render()
    {
        return view('livewire.fund-card');
    }
}
