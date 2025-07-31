<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\EditFundForm;
use App\Models\Fonds;
use Livewire\Component;

class EditFund extends Component
{

    public Fonds $fund;
    public $model;
    public EditFundForm $form;

    protected $listeners = ['openmodal' => 'handleOpenModal'];

    public function handleOpenModal($modal)
    {
        if ($modal === 'edit-fund') {
            $this->showModal = true;
        }
    }

    public function close()
    {
        $this->showModal = false;
    }


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
        $this->reset(['title', 'showModal']);
    }

    public function deleteFund()
    {
        $fund = Fonds::find($this->model);

        if ($fund) {
            $fund->delete();
            redirect()->route('accounting');
        }
    }


    public function render()
    {
        return view('livewire.modals.edit-fund');
    }

}
