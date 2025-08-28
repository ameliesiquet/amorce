<?php

namespace App\Livewire\Forms;

use AllowDynamicProperties;
use Livewire\Attributes\Validate;
use Livewire\Form;

#[AllowDynamicProperties]
class EditProjectForm extends Form
{
    #[Validate] public ?string $name = null;
    public ?string $description = null;

    public function hydrateForm($model)
    {
        $this->name = $model->name ?? null;
        $this->description = $model->description ?? null;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'description' => 'nullable|max:1000',
        ];
    }
}
