<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\MakeTransactionForm;
use App\Models\Fonds;
use App\Models\Transaction;
use App\Models\Transactions;
use Livewire\Component;

class MakeTransaction extends Component
{
    public $funds;
    public $model;
    public ?Fonds $fund = null;

    public MakeTransactionForm $form;

    public $amount;


    public function mount($model = null): void
    {
        $this->model = $model;
        $this->fund = Fonds::findOrFail($model);
        $this->funds = Fonds::all();

        if ($this->fund) {
            $this->form->from_fund = $this->fund->id;
            $this->form->from_fund_title = $this->fund->title;
            $this->form->to_fund = $this->fund->id;

            $this->form->title = $this->fund->title;
        }
    }

    public function makeTransaction(): void
    {
        $this->validate();

        $amount = $this->form->amount;
        $fromFundId = $this->form->from_fund;
        $toFundId = $this->form->to_fund;

        $fromFund = Fonds::find($fromFundId);
        $toFund = Fonds::find($toFundId);

        $balance = $fromFund->transactions()->where('status_type', 'entrée')->sum('amount') -
            $fromFund->transactions()->where('status_type', 'sortie')->sum('amount');

        if ($amount > $balance) {
            $this->addError('form.amount', 'Fonds „' . $fromFund->title . '“ n‘a pas assez d‘argent sur le compte (il restent ' . number_format($balance, 2) . ' € ).');
            return;
        }

        $date = now();

        Transactions::create([
            'amount' => $amount,
            'fonds_id' => $fromFundId,
            'transaction_type' => 'Virement au ' . $toFund->title,
            'status_type' => 'sortie',
            'created_at' => $date,
        ]);

        Transactions::create([
            'amount' => $amount,
            'fonds_id' => $toFundId,
            'transaction_type' => 'Virement du ' . $fromFund->title,
            'status_type' => 'entrée',
            'created_at' => $date,
        ]);

        $this->dispatch('refresh-make-transaction');
        $this->dispatch('close-modal');
    }


    public function render()
    {
        return view('livewire.modals.make-transaction');
    }
}
