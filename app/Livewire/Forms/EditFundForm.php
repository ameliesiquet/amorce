<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class EditFundForm extends Form
{
    #[Validate('required|string')]
    public string $title;


    public function hydrateForm($model)
    {
        $this->title = $model['title'];
    }
}
