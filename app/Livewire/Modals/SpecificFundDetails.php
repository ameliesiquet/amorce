<?php
namespace App\Livewire\Modals;

use App\Livewire\Pages\Accounting\SpecificFunds;
use App\Models\Fonds;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class SpecificFundDetails extends Component
{
    use WithPagination;
    public Fonds $specificFund;
    public $showModal = false;
    public $search = '';
    public bool $allowOpen = true;
    protected $listeners = ['block-open', 'allow-open', 'modal-state-changed'];

    public function blockOpen()
    {
        $this->allowOpen = false;
        $this->showModal = false;
    }

    public function allowOpen()
    {
        if ($this->modalOpen === null) {
            $this->allowOpen = true;
            $this->showModal = true;
            $this->emit('modal-state-changed', 'details');
        }
    }

    public function modalStateChanged($modal)
    {
        $this->modalOpen = $modal;
        if ($modal !== 'details') {
            $this->showModal = false;
        }
    }

    public function close()
    {
        $this->showModal = false;
        $this->modalOpen = null;
        $this->emit('modal-state-changed', null);
        $this->dispatch('close-specific-fund-modal');
    }



    #[On('close-specific-fund-modal')]
    public function onCloseModal()
    {
        $this->showModal = false;
    }


    public function mount($model)
    {
        $this->specificFund = Fonds::find($model);
        if (!$this->specificFund) {
            $this->dispatch('close-specific-fund-modal');
            return;
        }
        if ($this->allowOpen) {
            $this->showModal = true;
        }
    }




    public function open()
    {
        $this->showModal = true;
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
