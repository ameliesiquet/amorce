<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class MakeTransactionForm extends Form
{
    #[Validate]
    public $amount;
    public string $title;
    public $from_fund;
    public $to_fund;



    public function mount($fund = null)
    {
        if ($fund) {
            $this->from_fund = $fund->id; // Initialisiere from_fund mit dem Fonds, von dem die Transaktion kommt
            $this->title = $fund->title;
        }
        app()->setLocale('fr');
    }

    public function rules()
    {
        return [
            'amount' => 'required|numeric|min:1',
            'title' => 'required|max:50',
        ];
    }
}
