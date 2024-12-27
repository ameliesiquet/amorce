<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\EditFundForm;
use App\Models\Fonds;
use Livewire\Component;

class FundEdit extends Component
{

    public Fonds $fund;
    public $model;
    public EditFundForm $form;

    public function mount($model = null): void
    {
        $this->model = $model;
        $this->fund = Fonds::find($model);
        if ($this->fund) {
            $this->form->title = $this->fund->title;
        }

    }

    public function editFund(): void
    {
        $this->validate();
        $data = $this->form->all();
        $fund = Fonds::find($this->model);
        $fund->update($data);
        $this->dispatch('refresh-specific-funds');
        $this->dispatch('close-modal');
    }

    public function render()
    {
        return view('livewire.modals.fund-edit');
    }

}
