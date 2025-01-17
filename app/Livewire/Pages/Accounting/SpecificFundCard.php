<?php

namespace App\Livewire\Pages\Accounting;

use App\Models\Fonds;
use Livewire\Attributes\On;
use Livewire\Component;

class SpecificFundCard extends Component
{
    public Fonds $specificFund;
    public $search ='';

    public function mount(Fonds $fund)
    {
        $this->specificFund = $fund;
    }

    public function openmodal($which, $modelId = null): void
    {
        $this->dispatch('openmodal', $which, $modelId);
    }


    #[On('refresh-specific-funds')]
    public function refreshFunds(): void
    {
        $this->funds = Fonds::where('specific', true)->get();
    }

    #[On('refresh-make-transaction')]
    public function refresMakeTransaction(): void
    {
        $this->funds = Fonds::where('specific', false)->get();
        $this->funds = Fonds::where('specific', true)->get();
    }
    public function render()
    {
        $income = $this->specificFund->transactions()
            ->where('status_type', 'entrée')
            ->sum('amount');

        $expenses = $this->specificFund->transactions()
            ->where('status_type', 'sortie')
            ->sum('amount');

        $total = $income - $expenses;

        return view('livewire.pages.accounting.specific-fund-card', [
            'search' => $this->search,
            'income' => $income,
            'expenses' => $expenses,
            'total' => $total,
        ]);
    }
}
