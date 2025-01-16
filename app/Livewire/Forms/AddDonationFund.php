<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class AddDonationFund extends Form
{
    public $amount;
    public $created_at;
    public $fonds_id;

    #[Validate]
    public function rules()
    {
        return [
            'amount' => 'required|numeric|min:1',
            'created_at' => 'required|date_format:d/m/y',
            'fonds_id' => 'required|exists:fonds,id',
        ];
    }
}

