<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class MakeTransactionForm extends Form
{
    #[Validate]
    public $amount;

    public function mount()
    {
        app()->setLocale('fr');
    }

    public function rules()
    {
        return [
            'amount' => 'max:7|numeric',
        ];
    }
}
