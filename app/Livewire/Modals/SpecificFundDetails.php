<?php
namespace App\Livewire\Modals;

use App\Livewire\Pages\Accounting\SpecificFunds;
use App\Models\Fonds;
use Livewire\Attributes\On;
use Livewire\Component;

class SpecificFundDetails extends Component
{
    public Fonds $specificFund;
    public $showModal = true;
    public $search = '';

    protected $listeners = [
        'modal-opened' => 'checkIfShouldOpen',
    ];

    #[On('close-modal')]
    public function onCloseModal()
    {
        $this->showModal = false;
    }


    public function close()
    {
        $this->showModal = false;
        $this->dispatch('close-modal');
    }


    public function mount($model)
    {
        $this->specificFund = Fonds::findOrFail($model);
        $this->showModal = true;
    }


    public function open()
    {
        $this->showModal = true;
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

        return view('livewire.modals.specific-fund-details', [
            'income' => $income,
            'expenses' => $expenses,
            'total' => $total,
            'transactions' => $transactions,
        ]);
    }
}
