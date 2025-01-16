<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\AddDonationFund;
use App\Models\Fonds;
use App\Models\Transactions;

use Illuminate\Support\Carbon;
use Livewire\Component;


class AddDonation extends Component
{
    public $amount;
    public $created_at;
    public $fonds_id;
    public $funds = [];
    public AddDonationFund $form;

    public function mount(): void
    {
        $this->funds = Fonds::all();
    }

    protected $rules = [
        'form.amount' => 'required|numeric|min:1',
        'form.created_at' => 'required|date_format:d/m/y',
        'form.fonds_id' => 'required|exists:fonds,id',
    ];


    public function addDonation()
    {
        $this->form->amount = $this->amount;
        $this->form->created_at = $this->created_at;
        $this->form->fonds_id = $this->fonds_id;


        $this->validate();
        $date = Carbon::createFromFormat('d/m/y', $this->created_at);

        Transactions::create([
            'amount' => $this->form->amount,
            'fonds_id' => $this->form->fonds_id,
            'transaction_type' => 'Cash',
            'status_type' => 'entrée',
            'created_at' => $date,
        ]);

        $this->dispatch('refresh-funds');
        $this->dispatch('close-modal');
    }


    public function render()
    {
        return view('livewire.modals.add-donation');
    }
}
