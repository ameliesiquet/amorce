<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;
use App\Models\Fonds;
use Livewire\WithPagination;

class FundTransactions extends Component
{
    use WithPagination;

    public $search = '';
    public Fonds $fund;

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


    public function updatedSearch()
    {
        $this->resetPage(); // Pagination auf Seite 1 zurücksetzen
    }

    public function render()
    {

        return view('livewire.fund-transactions');
    }

}

