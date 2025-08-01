<?php

namespace App\Livewire\Pages\Accounting;

use App\Models\Fonds;
use Livewire\Attributes\On;
use Livewire\Component;

class SpecificFundCard extends Component
{
    public Fonds $specificFund;
    public $search = '';
    public $modal = null;
    public $modalParams = null;

    protected $listeners = ['close-modal' => 'closeModal'];

    public function closeModal()
    {
        $this->modal = null;
        $this->modalParams = null;
    }
    #[On('fund-deleted')]
    public function onFundDeleted($id)
    {
        if ($this->specificFund->id == $id) {
            $this->modal = null;
            $this->modalParams = null;
        }
    }

    public function mount(Fonds $fund)
    {
        $this->specificFund = $fund;
    }

    public function openmodal($which, $modelId = null): void
    {
        $this->modal = $which;
        $this->modalParams = [
            'id' => $modelId,
            'timestamp' => now()->timestamp,
        ];
        if ($which === 'specific-fund-details') {
            $this->dispatch('modal-opened', which: $which, id: $modelId);
        }
    }




    #[On('close-modal')]
    public function handleCloseModal()
    {
        $this->modal = null;
        $this->modalParams = null;
    }

    #[On('refresh-specific-funds')]
    public function refreshFunds(): void
    {
        $this->funds = Fonds::where('specific', true)->get();
    }

    #[On('refresh-make-transaction')]
    public function refreshMakeTransaction(): void
    {
        $this->specificFund = Fonds::find($this->specificFund->id);
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

        $transactions = $this->specificFund->transactions()
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('transaction_type', 'like', '%' . $this->search . '%')
                        ->orWhere('amount', 'like', '%' . $this->search . '%')
                        ->orWhere('status_type', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('livewire.pages.accounting.specific-fund-card', [
            'search' => $this->search,
            'income' => $income,
            'expenses' => $expenses,
            'total' => $total,
        ]);
    }
}
