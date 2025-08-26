<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class EditFundForm extends Form
{
    #[Validate]
    public ?string $title = null;



    public function mount()
    {
        app()->setLocale('fr');
    }


    public function hydrateForm($model)
    {
        $this->title = $model['title'];
    }

    public function rules()
    {
        return [
            'title' => 'required|max:50',
        ];
    }
}
