<?php

namespace App\Livewire;

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

    public function render()
    {
        // Paginated results
        $transactions = $this->fund->transactions()
            ->where('transaction_type', 'like', '%' . $this->search . '%') // Beispiel für Filterung
            ->paginate(5);

        return view('livewire.fund-transactions', compact('transactions'));
    }

    public function updatedSearch()
    {
        $this->resetPage(); // Pagination auf Seite 1 zurücksetzen
    }
}

