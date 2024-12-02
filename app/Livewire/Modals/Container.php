<?php

namespace App\Livewire\Modals;

use Livewire\Attributes\On;
use Livewire\Component;

class Container extends Component
{
    public $child = '';

    public $model = null;
    #[On('openmodal')]
    public function openModal($which, $model = null)
    {
        if($which) {
            $this->child = $which;
        }
        if($model) {
            $this->model = $model;
        }

    }

    public function render()
    {
        return view('livewire.modals.container');
    }
}
