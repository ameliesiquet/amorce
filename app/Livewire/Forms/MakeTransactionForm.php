<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class MakeTransactionForm extends Form
{
    #[Validate]
    public $amount;
    public string $title;


    public function mount()
    {
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
