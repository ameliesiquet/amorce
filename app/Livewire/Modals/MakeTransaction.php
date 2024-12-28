<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\MakeTransactionForm;
use App\Models\Fonds;
use Livewire\Component;

class MakeTransaction extends Component
{
    public $fund;
    public $funds;
    public $model;


    public MakeTransactionForm $form;
    public $specificFund;


    public function mount($fund = null, $specificFund = null)
    {
        $this->fund = $fund;
        $this->funds = Fonds::all();

        $this->specificFund = $specificFund;
    }

    public function makeTransaction(): void
    {
        $this->validate();
        $data = $this->form->all();
        $fund = Fonds::find($this->model);
        $fund->update($data);
        $this->dispatch('refresh-make-transaction');
        $this->dispatch('close-modal');
    }

    public function render()
    {
        return view('livewire.modals.make-transaction');
    }
}
