<?php

namespace App\Livewire\Pages\Accounting;

use App\Models\Fonds;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;


class FundCard extends Component
{
    use WithPagination;

    public Fonds $fund;
    public $search ='';
    public $sortField = '';
    public $sortAsc = true;


    public function mount(Fonds $fund)
    {
        $this->fund = $fund;
    }


    #[Computed]
    public function transactions()
    {
        return $this->fund->transactions()
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('transaction_type', 'like', '%' . $this->search . '%')
                        ->orWhere('amount', 'like', '%' . $this->search . '%')
                        ->orWhere('status_type', 'like', '%' . $this->search . '%');
                });
            })
            ->paginate(5);
    }
    #[On('refresh-funds')]
    public function refreshFunds(): void
    {
        $this->funds = Fonds::where('specific', false)->get();
    }
    #[On('refresh-make-transaction')]
    public function refreshMakeTransaction(): void
    {
        $this->fund = Fonds::find($this->fund->id);
    }



    public function openmodal($which, $model = null): void
    {
        $this->dispatch('openmodal', $which, $model);
    }

    public function highlight($text, $search)
    {
        if (!$search) {
            return e($text);
        }

        $highlighted = preg_replace(
            '/(' . preg_quote($search, '/') . ')/i',
            '<span class="text-black-500 font-bold underline ">$1</span>',
            e($text)
        );

        return $highlighted;
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortField = $field;
            $this->sortAsc = true;
        }
    }

    public function render()
    {
        $income = $this->fund->transactions()
            ->where('status_type', 'entrée')
            ->sum('amount');

        $expenses = $this->fund->transactions()
            ->where('status_type', 'sortie')
            ->sum('amount');

        $total = $income - $expenses;

        $transactions = $this->fund->transactions()
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('transaction_type', 'like', '%' . $this->search . '%')
                        ->orWhere('amount', 'like', '%' . $this->search . '%')
                        ->orWhere('status_type', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('livewire.pages.accounting.fund-card', [
            'transactions' => $transactions,
            'search' => $this->search,
            'income' => $income,
            'expenses' => $expenses,
            'total' => $total,
            'amount' => $this->fund->transactions()->sum('amount'),
        ]);
    }




}
