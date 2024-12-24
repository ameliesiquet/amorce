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

    public function mount($model = null)
    {
        if ($model) {
            $this->fund = Fonds::find($model);
            if ($this->fund) {
                $this->form->title = $this->fund->title;
            }
        }
    }


    public function editFund()
    {
        $this->validate();
        $data = $this->form->all();
        $fund = Fonds::find($this->model['id']);
        $fund->update($data);

    }

    public function render()
    {
        return view('livewire.modals.fund-edit');
    }

}
